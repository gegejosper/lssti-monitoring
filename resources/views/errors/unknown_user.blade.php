
@extends('errors.error-layout')

@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/1.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
    Unknown User...
    </div>
    <div class="message" style="padding: 10px;">
        Your account does not associated with any roles of the system, back
        <a href="{{ route('logout') }}"  
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            id="signoutbtn">Click here.</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
@endsection