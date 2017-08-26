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
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <script src="{{ asset('/js/message.js') }}"></script>

    </head>
    <body>
        <div class="container">
            <div class="row">
              <div class="message">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul id='errors'>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
              </div>
            </div>
            <div class="row">
              <form action="{{route('store')}}" method="post" id="frm_message">
                <div class="form-group">
                  <label for='dst'>ФИО</label>
                  <input type='text' name='dst' id='dst' class='form-control' value="{{ old('dst') }}">
                </div>
                <div class="form-group">
                  <label for='mail'>mail</label>
                  <input type='text' name='mail' id='mail' class='form-control' value="{{ old('mail') }}">
                </div>
                <div class="form-group">
                  <label for='message'>Message</label>
                  <textarea name='message' id='message' class='form-control'>{{ old('message') }}</textarea>
                </div>
                <div class="form-group" id="block_captcha">
                  {!!captcha_img()!!}
                </div>
                <div class="form-group">
                  <label for='captcha'>captcha</label>
                  <input type='text' name='captcha' id='captcha' class='form-control'>
                </div>
                <div class="form-group">
                  {{ csrf_field() }}
                  <input type='submit' value="Send" id="send" class='form-control btn btn-success'>
                </div>

              </form>
            </div>
        </div>
    </body>
</html>
