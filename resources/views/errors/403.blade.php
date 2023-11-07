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
        <h1>Forbidden, back  <a href="{{ route('logout') }}"  
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            id="signoutbtn">Click here.</a></h1>
    
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection