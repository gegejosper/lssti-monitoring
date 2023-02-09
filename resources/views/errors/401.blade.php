
@extends('errors::error-layout')
@section('title')
Unauthorized
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/16.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        401
    </div>
    <div class="message" style="padding: 10px;">
    Unauthorized, back <a href="/">click here.</a>
    </div>
@endsection