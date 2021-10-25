@extends('layouts.app')
@section('title', 'Home')
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
  background-image: url('../img/test.png');
  min-height: 80%;

}

body, html {
  height: 100%;
  color: #777;
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
    <span class="w3-center w3-padding-large w3-black w3-xlarge w3-wide w3-animate-opacity">MY<span class="w3-hide-small"></span> RESUME</span>
  </div>
</div>





<div class="w3-content w3-container w3-shadow w3-animate-opacity w3-margin-bottom">
  <h1 class="w3-center">About Me</h1>
  <p>{{$details->mybio}}</p>
      <div class="w3-row">
          <div class="w3-col m5 l4">
            <img src="../img/propic.jpg">
          </div>
          <div class="w3-col m6 l6">
            <p><i class="fa fa-birthday-cake"></i> Birthday : {{ $details->dob }}</p>
            <p><i class="fa fa-map-pin"></i> Hometown : {{ $details->hometown }}</p>
            <p><i class="fa fa-envelope"></i> Email : {{ $details->email }}</p>
          </div>
      </div>
      <div class="w3-center w3-padding-64">
        <a href="#"><button class="w3-button w3-ripple w3-center w3-blue w3-round">Read More About Me!</button></a>
      </div>
</div>

<div class="w3-container w3-padding-32 w3-animate-opacity w3-light-grey ">
<h1 class="w3-center">My Skills</h1>
  <div class="w3-content">
    @foreach($skillnames as $skill)
    <p>{{$skill['name']}} </p>
    <div class="w3-light-grey w3-round w3-animate-opacity">
      <div class="w3-container w3-round w3-blue" style="width:{{$skill['value']}}%">{{$skill['value']}}%</div>
    </div>
    @endforeach
  </div>
    </div>

<div class="w3-container w3-content w3-animate-opacity w3-padding-32">

<div class="w3-container w3-center w3-margin-top">
  <h1>My Projects</h1>
  <div class="mycards">
  @foreach ($projects as $p)
  
    <div class="w3-card-4">
      <img src="../images/{{$p->img}}" alt="Image" class="mycardimg">
      <div class="w3-container w3-center w3-padding-16">
        <h4>{{$p->title}}</h4>
        <a href="{{ route('project_viewspecific',$p->id) }}" class="w3-button w3-block w3-blue w3-hover-shadow">View Project</a>
      </div>
    </div>
      
        
  @endforeach
@auth
  

  <div class="w3-card-4">
    <img src="../images/empty.png" alt="Image" class="mycardimg">
    <div class="w3-container w3-center w3-padding-16">
      <h4>Create New Project</h4>
      <a href="{{ route('proj_create') }}" class="w3-button w3-block w3-blue w3-hover-shadow">Create New Project</a>
    </div>
  </div>
  </div>
  </div>
@endauth
    
</div>

<div class="w3-container w3-sand w3-margin-top w3-padding-32">
<div class="w3-container w3-content">
  <h1 class="w3-center">Contact Me</h1>
  <p>Let's get in touch</p>
  <form action="{{route('send_message')}}" method="POST">
    @csrf
    <input class="w3-input w3-border" type="text" placeholder="Your Name" required name="name">
    <input class="w3-input w3-section w3-border" type="text" placeholder="Your Email" required name="email">
    <input class="w3-input w3-section w3-border" type="text" placeholder="Subject" required name="message">
    <button class="w3-button w3-black w3-section" type="submit">
      <i class="fa fa-paper-plane"></i> SEND MESSAGE
    </button>
  </form>

  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
@endif

</div>
</div>


  

@endsection