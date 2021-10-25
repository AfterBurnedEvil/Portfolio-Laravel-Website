@extends('layouts.nonindex')
@section('title', 'Edit Bio')
@section('content')

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
    <h3 class="w3-bar-item">Menu</h3>
    <a href="{{route('dboard')}}" class="w3-bar-item w3-button">Dashboard</a>
    <a href="{{route('skillz_show')}}" class="w3-bar-item w3-button">Skills</a>
    <a href="{{route('dbio')}}" class="w3-bar-item w3-button w3-green">My Bio</a>
    <a href="{{route('skille_view', auth()->user()->id)}}" class="w3-bar-item w3-button">My Skills</a>
  </div>
  
  <div style="margin-left:15%">
  
  <div class="w3-container w3-teal">
    <h1>Bio</h1>
  </div>
  
  
  
  <div class="w3-container">
  <form class="w3-container w3-card-4 w3-light-grey" action="{{ route('dbio_updatez',$details->user_id)}}" method="POST">
      @csrf
    <h3>Enter Data:</h3>
    <p>      
    <label>Date Of Birth</label>
    <input class="w3-input w3-border-0" type="date" name="dob" value="{{$details->dob}}"></p>
    <label>My Bio</label>
    <input class="w3-input w3-border-0" type="text" name="mybio" value="{{$details->mybio}}"></p>
    <label>Email</label>
    <input class="w3-input w3-border-0" type="text" name="email" value="{{$details->email}}"></p>
    <label>HomeTown</label>
    <input class="w3-input w3-border-0" type="text" name="hometown" value="{{$details->hometown}}"></p>
  
    <button class="w3-button w3-round-xlarge w3-blue w3-margin" type="submit">Update</button> <br>
    
  </form>
      @if ($errors->any())
      <div class="w3-panel w3-red w3-display-container">
      <span onclick="this.parentElement.style.display='none'"
      class="w3-button w3-large w3-display-topright">&times;</span>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
      </div>
      @enderror
  
  </div>
  
  </div>


@endsection