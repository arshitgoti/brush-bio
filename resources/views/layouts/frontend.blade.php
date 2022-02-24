<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> @yield('title') |{{ config('app.name') }}</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;1,300;1,400;1,500&display=swap"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel='stylesheet' type='text/css' media='screen' href='{{ asset('css/front_style.css') }}'>
    <link rel="shortcut icon" href="images/favicon.png">
      
</head>

<body>
    @auth
    <div class="topnav" id="myTopnav">
      <a href="#home" class="active">Welcome, {{Auth::user()->first_name}}!</a>
      <a href="{{route('user.dashboard')}}">Edit Profile</a>
      <a href="{{route('user.custom.logout', Auth::user()->slug)}}">Logout</a>
      <a href="javascript:void(0);" class="icon" onclick="myFunction()">
        <i class="fa fa-bars"></i>
      </a>
    </div>
    @endauth

    @yield('content')
</body>
<script>
    function togglePortfolio() {
        var popupElement = document.getElementById("portfolio");
        popupElement.classList.toggle("open");
    }

    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "topnav") {
        x.className += " responsive";
      } else {
        x.className = "topnav";
      }
    }
</script>
</html>
