<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css">

        <script type="text/javascript" language="javascript" src="{{ asset('js/jquery-1.12.4.js') }}"></script>
        <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js">
      	</script>


    </head>
    <body>
        <div class="container">
            <div class="row">
              <table  id='messages' class="DtatTable" cellspacing="0" width="100%">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>dst</th>
                    <th>mail</th>
                    <th>created_at</th>
                    <th>message</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($messages as $message)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$message->dst}}</td>
                    <td>{{$message->mail}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>{{$message->message}}</td>
                  </tr>
                @endforeach
                <tbody>
              </table>
            </div>
            <div class="row">

            </div>
        </div>
    </body>
    <script src="{{ asset('js/messages.js') }}"></script>
</html>
