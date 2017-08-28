@extends('layouts.app')

@section('content')
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
            <th>file</th>
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
            <td><a href='{{ asset("storage/$message->file_name") }}'>{{$message->origin_name}}</a></td>
          </tr>
        @endforeach
        <tbody>
      </table>
    </div>
    <div class="row">

    </div>
</div>

<script src="{{ asset('js/messages.js') }}"></script>
@endsection
