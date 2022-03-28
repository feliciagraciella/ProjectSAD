<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Material+Icons" />

    <link rel="stylesheet" href={{ asset('css/header.css') }} type="text/css"/>
    <script type="text/javascript" src= {{ asset('js/header.js') }}></script>
</head>


<body>
    <button id="btnScrollTop" onclick="scrollToTop()">
        <i class="material-icons">keyboard_double_arrow_up</i>
    </button>

    <div class="sidemenu-container">
        <img class="logo" src="images/logo/logo.png" style="height: 150px" alt="Logo" />
        <a> Products List </a>
    </div>

    </div> --}}

    <!-- Side navigation -->
<div class="sidenav">
    <a href="#">About</a>
    <a href="#">Services</a>
    <a href="#">Clients</a>
    <a href="#">Contact</a>
  </div>

  <!-- Page content -->
  <div class="main">
    ...
  </div>
</body>

</html>
