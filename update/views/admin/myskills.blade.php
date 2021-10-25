@extends('layouts.nonindex')
@section('title', 'My Skills')
@section('content')

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:15%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="{{route('dboard')}}" class="w3-bar-item w3-button">Dashboard</a>
  <a href="{{route('skillz_show')}}" class="w3-bar-item w3-button">Skills</a>
  <a href="{{route('dbio')}}" class="w3-bar-item w3-button">My Bio</a>
  <a href="{{route('skille_view', auth()->user()->id)}}" class="w3-bar-item w3-button w3-green">My Skills</a>
</div>
<div style="margin-left:15%">


<div class="w3-container w3-blue">
  <h1>Skills</h1>
</div>
<div class="w3-content">

<form class="w3-container w3-card-4 w3-light-grey" action="{{ route('myskillz_store') }}" method="POST">
@csrf
<h3>Skills:</h3>
@foreach($skillnames as $skill)


<label>{{$skill['name']}} </label>
<input type="hidden" name="skillid[]" value="{{$skill['skill_id']}}">
<input class="w3-input w3-border-0" type="text" name="value[]" value="{{$skill['value']}}"></p>

  
@endforeach
<button class="w3-button w3-round-xlarge w3-blue w3-margin" type="submit">Submit</button> <br>
</form>
</div>
</div>



@endsection