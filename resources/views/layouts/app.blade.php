<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Afterburn | @yield('title') </title>
  <link href=" {{ URL::asset('css/w3.css'); }}" rel="stylesheet">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href=" {{ URL::asset('css/mycss.css'); }}" rel="stylesheet">

<style>

.w3-Allerta {
  font-family: 'Allerta Stencil', sans-serif;
}

body, h1, h2, h3, h4, h5, h6  {
  font-family: Roboto, sans-serif;
}

.w3-bar{
  color: white;
}
</style>
{!! htmlScriptTagJsApi([
  'action' => 'homepage',
  'callback_then' => 'callbackThen',
  'callback_catch' => 'callbackCatch'
]) !!}

</head>
<body>

  <header>
  </header>
  <div class="w3-top">
    <div class="w3-bar w3-border w3-white" id="myNavbar">
    
    <span class="w3-bar-item w3-Allerta">Akshay Jose Portfolio</span>
    <a href="{{ route('home') }}" class="w3-bar-item w3-button w3-mobile w3-hover-green w3-hide-small">Home</a>
    <a href="#" class="w3-bar-item w3-button w3-mobile w3-blue w3-hide-small">Download Resume</a>
    <a class="w3-bar-item w3-button w3-hover-black w3-hide-medium w3-hide-large w3-right" href="javascript:void(0);" onclick="toggleFunction()" title="Toggle Navigation Menu">
        <i class="fa fa-bars"></i>
      </a>
      @auth
            <a href="{{route('dboard')}}" class="w3-bar-item w3-button w3-mobile w3-yellow w3-hide-small">Dashboard</a>
            <a href="{{route('message_viewall')}}" class="w3-bar-item w3-button w3-mobile w3-hide-small">Messages</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-mobile w3-blue w3-hide-small w3-right">Logout</a>
      
      @else
      <a href="{{route('login')}}" class="w3-bar-item w3-button w3-mobile w3-hover-green w3-hide-small w3-right">Login</a>
      @endauth
    </div>

    <!-- Navbar on small screens -->
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
      <a href="{{ route('home') }}" class="w3-bar-item w3-button" onclick="toggleFunction()">Home</a>
      <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">Download Resume</a>
      @auth
            <a href="{{route('dboard')}}" class="w3-bar-item w3-button w3-yellow ">Dashboard</a>
            <a href="{{route('message_viewall')}}" class="w3-bar-item w3-button ">Messages</a>
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="w3-bar-item w3-button w3-blue">Logout</a>
      
      @else
      <a href="{{route('login')}}" class="w3-bar-item w3-button w3-hover-green">Login</a>
      @endauth
    </div>

</div>
 

@yield('content')


<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    {{ csrf_field() }}
</form>

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

<script>
  // Change style of navbar on scroll
window.onscroll = function() {myFunction()};
function myFunction() {
    var navbar = document.getElementById("myNavbar");
    if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
        navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
    } 
}

// Used to toggle the menu on small screens when clicking on the menu button
function toggleFunction() {
    var x = document.getElementById("navDemo");
    if (x.className.indexOf("w3-show") == -1) {
        x.className += " w3-show";
    } else {
        x.className = x.className.replace(" w3-show", "");
    }
}


</script>


</body>




</html>