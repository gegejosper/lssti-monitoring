@extends('errors::error-layout')
@section('title')
Forbidden
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/17.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        403
    </div>
    <div class="message" style="padding: 10px;">
    Forbidden, back <a href="/">click here.</a>
    </div>
@endsection