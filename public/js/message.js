$( document ).ready(function() {
  $("#send").click(function(event)
  {
    //return 0;
    event.preventDefault(); // cancel default behavior
    $("div.message").empty();
    var datastring = $("#frm_message").serialize();

    $.ajax({
      type: "POST",
      url: $("#frm_message").attr('action'),
      data: datastring,
      dataType: "json",
      success: function(data) {
        console.log(data);
        $("div.message").append('<div class="alert alert-success">' + data.message + '</div>');
        $('#dst').val('');
        $('#mail').val('');
        $('#message').val('');
        $('#captcha').val('');
        $('#file_name').val('');
        $('#origin_name').val('');
        $('#attach').val('');
        $.ajax({
            method: 'GET',
            url: '/get_captcha',
        }).done(function (response) {
            //captcha.prop('src', response);
            $('#block_captcha').empty();
            $('#block_captcha').append(response.captcha);

        });
      },
      error: function(data){
        var errors = data.responseJSON;

        $("div.message").append('<div class="alert alert-danger"><ul class="errors"></ul></div>');
        $.each( errors, function( key, value ) {
          $("ul.errors").append('<li>'+value+'</li>');
			  });
        $('#captcha').val('');

        $.ajax({
            method: 'GET',
            url: '/get_captcha',
        }).done(function (response) {
            //captcha.prop('src', response);
            $('#block_captcha').empty();
            $('#block_captcha').append(response.captcha);
            console.log(response.captcha);
        });
      }
    });
  });

  //Переменная куда будут располагаться данные файлов
  var files;

  // Вешаем функцию на событие
  // Получим данные файлов и добавим их в переменную
  $('input[type=file]').change(function(){
    console.log("change");
      files = this.files;
      $('#send').prop('disabled', true);

      var data = new FormData();
      data.append( 'attach', $('#attach').prop('files')[0]);
      data.append( '_token', $('input[name="_token"]').attr('value') );
      // Отправляем запрос
      if(this.files[0].size > 4194304){
        $("div.message").append('<div class="alert alert-danger"><ul class="errors"></ul></div>');
        $("ul.errors").append('<li>Size file more then 4MB!</li>');
        $('#attach').val('');
        $('#file_name').val('');
        $('#origin_name').val('');
        console.log('size: ', this.files[0].size);
        return;
      }
      $.ajax({
          url: 'load_file',
          //'X-CSRF-TOKEN': $('input[name="_token"]').attr('value'),
          type: 'POST',
          //data: data,
          data: new FormData($('#frm_message')[0]),
          cache: false,
          //dataType: 'json',
          processData: false, // Не обрабатываем файлы (Don't process the files)
          contentType: false, // Так jQuery скажет серверу что это строковой запрос
          success: function( respond, textStatus, jqXHR ){

              // Если все ОК

              if( typeof respond.error === 'undefined' ){
                  // Файлы успешно загружены, делаем что нибудь здесь
                  console.log(respond);
                  $('#file_name').val(respond.file_name);
                  $('#origin_name').val(respond.oring_name);
                  // выведем пути к загруженным файлам в блок '.ajax-respond'

                  var files_path = respond.files;
                  var html = '';
                  $.each( files_path, function( key, val ){ html += val +'<br>'; } )
                  $('.ajax-respond').html( html );
              }
              else{
                  console.log('ОШИБКИ ОТВЕТА сервера: ' + respond.error );
              }
          },
          error: function( jqXHR, textStatus, errorThrown ){
              console.log('ОШИБКИ AJAX запроса: ' + textStatus );
          }
      });

      $('#send').prop('disabled', false);
  });
});
