@extends('layouts.nonindex')
@section('title', 'Login')
@section('content')
<div class="w3-content w3-container w3-padding-64 w3-border w3-margin-top">
    <h1 class="w3-center"> Login</h1>
    <div class="w3-container w3-center">
    <form method="POST" action="{{ route('login') }}">
    @csrf
    Username:
    <input type="text" id="username" name="username"> <br> <br>
    Password:
    <input type="password" id ="password" name="password"><br> <br>
    @if ($errors->any())
    <div class="w3-panel w3-red w3-display-container">
    <span onclick="this.parentElement.style.display='none'"
    class="w3-button w3-large w3-display-topright">&times;</span>
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
    </div>
    @enderror
    <br>
    <button class="w3-button w3-round-xlarge w3-blue" type="submit">
    {{ __('Login') }}
    </button>
    </div>
</div>
@endsection