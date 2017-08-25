<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
              <table class="table table-bordered table-striped">
                <th>
                  <td>dst</td>
                  <td>mail</td>
                  <td>created_at</td>
                  <td>message</td>
                </th>
                @foreach($messages as $message)
                  <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$message->dst}}</td>
                    <td>{{$message->mail}}</td>
                    <td>{{$message->created_at}}</td>
                    <td>{{$message->message}}</td>
                  </tr>
                @endforeach
              </table>
            </div>
            <div class="row">

            </div>
        </div>
    </body>
</html>
