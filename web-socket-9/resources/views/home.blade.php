@extends('master')

@section('content')
    <h1>Home</h1>
    <form action="{{route('sendMessage')}}" method="post">
        @csrf
        <input type="text" name="message" id="">
        <button type="submit">Send</button>
    </form>
@endsection
