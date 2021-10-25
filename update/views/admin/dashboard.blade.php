@extends('layouts.nonindex')
@section('title', 'Dashboard')
@section('content')

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="{{route('dboard')}}" class="w3-bar-item w3-button w3-green">Dashboard</a>
  <a href="{{route('skillz_show')}}" class="w3-bar-item w3-button">Skills</a>
  <a href="{{route('dbio')}}" class="w3-bar-item w3-button">My Bio</a>
  <a href="{{route('skille_view', auth()->user()->id)}}" class="w3-bar-item w3-button">My Skills</a>
</div>

<div style="margin-left:15%">

<div class="w3-container w3-teal">
  <h1>Dashboard</h1>
</div>


<div class="w3-container">
<p>Use the sidebar to navigate.</p>
</div>

</div>


@endsection