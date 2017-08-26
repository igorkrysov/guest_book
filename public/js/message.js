$( document ).ready(function() {
  $("#send").click(function(event)
  {
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

});
