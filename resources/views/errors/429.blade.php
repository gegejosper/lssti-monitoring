@extends('errors::error-layout')
@section('title')
Too Many Requests
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/19.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        404
    </div>
    <div class="message" style="padding: 10px;">
    Too Many Requests, back <a href="/">click here.</a>
    </div>
@endsection