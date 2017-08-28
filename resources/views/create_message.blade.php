@extends('layouts.app')


@section('content')
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
      <form action="{{route('store')}}" method="post" id="frm_message" enctype="multipart/form-data">
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
        <div class="form-group">
          <input type="file" id='attach' name='attach' class='btn btn-default' accept=".jpeg,.png,.doc,.docx">
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
          <input type='hidden' value='' id='file_name' name='file_name'>
          <input type='hidden' value='' id='origin_name' name='origin_name'>
          <input type='submit' value="Send" id="send" class='form-control btn btn-success'>
        </div>
      </form>
    </div>
  </div>
  <script src="{{ asset('/js/message.js') }}"></script>
@endsection
