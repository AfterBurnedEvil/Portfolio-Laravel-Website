@extends('layouts.nonindex')
@section('content')

<div class="w3-container">
    <h1>Register</h1>
    <form method="POST" action="{{ route('register') }}">
@csrf

    Username:
    <input type="text" id="username" name="username">
    Name:
    <input type="text" id ="name" name="name">
    Passowrd:
    <input type="password" id ="password" name="password">

    Passowrd:
    <input type="password" id ="password-confirm" name="password_confirmation">
    
</div>

@error('password')
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
<button type="submit">
    {{ __('Register') }}
</button>
</div>

@endsection