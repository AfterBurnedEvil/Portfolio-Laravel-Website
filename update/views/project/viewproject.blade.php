@extends('layouts.nonindex')
@section('title', 'View Project')
@section('content')

<style>
    /* Create a Parallax Effect */
    .bgimg-1 {
      background-attachment: fixed;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
    }
    
    /* First image (Logo. Full height) */
    .bgimg-1 {
      background-image: url('/images/{{$projdetails->img}}');
      min-height: 80%;
    
    }
    
    body, html {
      height: 100%;
      color: rgb(0, 0, 0);
      line-height: 1.8;
    }
    
    .w3-wide {letter-spacing: 10px;}
    .w3-hover-opacity {cursor: pointer;}
    
    /* Turn off parallax scrolling for tablets and phones */
    @media only screen and (max-device-width: 1600px) {
      .bgimg-1{
        background-attachment: scroll;
        min-height: 400px;
      }
    }
    
    </style>
    
<!-- First Parallax Image with Logo Text -->
<div class="bgimg-1 w3-display-container w3-opacity-min">
    <div class="w3-display-middle" style="white-space:nowrap;">
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">{{$projdetails->title}}</span>
    </div>
</div>


<div class="w3-container w3-content">

    <h1>{!!$projdetails->title!!}</h1>
    <p>{!!$projdetails->body!!}</p>


  @auth
  
  <a href="{{ route('project_editview',$projdetails->id) }}"><button class="w3-button w3-ripple w3-center w3-blue w3-round">Edit Project</button></a>
  <form action="{{route('project_delete',$projdetails->id)}}" method="POST">
    @csrf
    <button class="w3-button w3-red" type="submit">Delete Project</button> <br>
  </form>
  @endauth
</div>


<div class="w3-container w3-black w3-margin-top w3-padding-32">
  <div class="w3-container w3-content">
    <div class="w3-container w3-center">
      <p>Made By Akshay Jose</p>
      <a href="http://www.facebook.com/afterburnedevil"><i class="fa fa-facebook"></i></a> &nbsp
      <a href="http://www.instagram.com/afterburnedevil"><i class="fa fa-instagram"></i></a>&nbsp
      <a href="https://soundcloud.com/user-499108523"><i class="fa fa-soundcloud"></i></a>
    </div>
  </div>
  </div>
  
@endsection