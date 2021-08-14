<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>TESTT</title>
  <link href=" {{ URL::asset('css/home.css'); }}" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;400&display=swap" rel="stylesheet">
 

</head>
<body>
  <div class="maine">
<header>
  <div class="logo-container">
    <h4 class="logo">AfterBurnedEvil</h4>
  </div>

  <nav>
    <ul class="nav-links">
      <li ><a class="navlink" href="#">Home</a></li>
      <li ><a class="navlink" href="#">Music</a></li>
      <li ><a class="navlink" href="#">About</a></li>
    </ul>
  </nav>



</header>

</div>
  <div>
       @yield('content')
  </div>
</body>

</html>
