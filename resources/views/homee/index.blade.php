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
	background: linear-gradient(-45deg, #ee7752, #e73c7e, #23a6d5, #23d5ab);
	background-size: 400% 400%;
	animation: gradient 15s ease infinite;
	min-height: 80%;
}

@keyframes gradient {
	0% {
		background-position: 0% 50%;
	}
	50% {
		background-position: 100% 50%;
	}
	100% {
		background-position: 0% 50%;
	}
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
    <div class="fadetext fade">
    <span class="w3-center w3-padding-large w3-white w3-large w3-wide w3-animate-opacity">Hi!</span>
    </div>
    <div class="fadetext fade">
      <span class="w3-center w3-padding-large w3-white w3-large w3-wide w3-animate-opacity w3-hide-small w3-hide-medium">I am a backend web developer</span>
      <div class="w3-center w3-text-white w3-large w3-animate-opacity w3-hide-large">I am a backend web developer</div>
    </div>
    <div class="fadetext fade">
      <span class="w3-center w3-padding-large w3-white w3-large w3-wide w3-animate-opacity w3-hide-small">Scroll down to view everything about me</span>
      <div class="w3-center w3-text-white w3-large w3-animate-opacity w3-hide-large w3-hide-medium">Scroll down to view everything about me</div>
    </div>
  </div>
  <div class="w3-display-right contactelements w3-text-white w3-center w3-padding-64">
    <a href="http://www.facebook.com/afterburnedevil"><i class="fa fa-facebook w3-xlarge"></i></a> &nbsp <br>
    <a href="http://www.instagram.com/afterburnedevil"><i class="fa fa-instagram w3-xlarge"></i></a>&nbsp <br>
    <a href="https://soundcloud.com/user-499108523"><i class="fa fa-soundcloud w3-xlarge"></i></a> <br>
  </div>
  <div class="w3-display-bottommiddle" style="white-space:nowrap;">
    <i class="fa fa-angle-double-down" style="font-size:48px;color:white"></i>
  </div>
</div>





<div class="w3-content w3-container w3-shadow w3-animate-opacity w3-margin-bottom">
  <h1 class="w3-center w3-lobster">About Me</h1>
  <p class="w3-center w3-roboto">{{$details->mybio}}</p>
      <div class="w3-row">
          <div class="w3-col m5 l5 w3-center">
            <img src="../img/propic.jpg" class="w3-hover-sepia">
          </div>
          <div class="w3-col m6 l6 w3-hide-small">
            <p><i class="fa fa-birthday-cake"></i> Birthday : {{ $details->dob }}</p>
            <p><i class="fa fa-map-pin"></i> Hometown : {{ $details->hometown }}</p>
            <p><i class="fa fa-envelope"></i> Email : {{ $details->email }}</p>
          </div>
          <div class="w3-col m6 l8 w3-hide-large w3-center w3-hide-medium">
            <p><i class="fa fa-birthday-cake"></i> Birthday : {{ $details->dob }}</p>
            <p><i class="fa fa-map-pin"></i> Hometown : {{ $details->hometown }}</p>
            <p><i class="fa fa-envelope"></i> Email : {{ $details->email }}</p>
          </div>
      </div>
      <div class="w3-center w3-padding-64 w3-bar">
        <a href="{{ route('project_viewspecific',12) }}"><button class="w3-button w3-ripple w3-center w3-green w3-round">Read More About Me!</button></a>
        <a href="#"><button class="w3-button w3-ripple w3-center w3-red w3-round">Download My Resume!</button></a>
      </div>
</div>

<div class="w3-container w3-padding-32 w3-animate-opacity w3-light-grey ">
<h1 class="w3-center w3-lobster">My Skills</h1>
  <div class="w3-content">
    @foreach($skillnames as $skill)
    <p>{{$skill['name']}} </p>
    <div class="w3-light-grey w3-round w3-animate-opacity">
      <div class="w3-container w3-round w3-blue animatehoverbar" style="width:{{$skill['value']}}%">{{$skill['value']}}%</div>
    </div>
    @endforeach
  </div>
</div>

<div class="w3-container w3-content w3-animate-opacity w3-padding-32">

<div class="w3-container w3-center w3-margin-top">
  <h1 class="w3-lobster">My Projects</h1>
  <div class="mycards">

  @foreach ($projects as $p)
  
    <div class="w3-card-4 margin-animate">
      <img src="../thumbnail/{{$p->img}}" alt="Image" class="mycardimg">
      <div class="w3-container w3-center w3-padding-16 ">
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
@endauth
</div>
</div>
</div>

<div class="w3-container contactanimate w3-margin-top w3-padding-32">
<div class="w3-container w3-content">
  <h1 class="w3-center w3-lobster">Contact Me</h1>
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

</div>
</div>

<script>
  var slideIndex = 0;
  showSlides();
  
  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("fadetext");
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";  
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}    
    slides[slideIndex-1].style.display = "block";  
    setTimeout(showSlides, 3000); // Change image every 2 seconds
  }
</script>


@endsection