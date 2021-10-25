@extends('layouts.nonindex')
@section('content')

<div class="w3-content w3-container w3-padding-64 w3-border w3-margin-top">
    <h1 class="w3-center"> Role Test</h1>
    @auth
    {{ Auth::user()->name }}
    {{ Auth::user()->password }}
    {{ Auth::user()->username }}
    {{ Auth::user()->role }}

    @if(Auth::user()->role == "norm")
    <p>Role : Normal</p>
    @endif
    @else
    not logged in
    @endauth
    @can('isAdminn')
    TestB
    @endif
</div>

@endsection