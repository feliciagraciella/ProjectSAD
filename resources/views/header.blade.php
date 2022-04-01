<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('css/header.css') }} type="text/css" />
    <script type="text/javascript" src={{ asset('js/header.js') }}></script>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>


<body>
    <button id="btnScrollTop" onclick="scrollToTop()">
        <i class="material-icons">keyboard_double_arrow_up</i>
        {{-- <span class="material-icons-outlined">
            keyboard_arrow_up
        </span> --}}
    </button>

    {{-- <div class="sidemenu-container">
        <img class="logo" src="images/logo/logo.png" style="height: 150px" alt="Logo" />
        <a> Products List </a>
    </div>

    </div> --}}

    <!-- Side navigation -->
    <div class="sidenav">
        <img class="logo" src="public/images/logo/logo.png" style="height: 150px" alt="Logo" />
        <a href="#">Products List</a>
        <a href="#">Transaction List</a>
        <a href="#">Reports</a>
    </div>

    <!-- Page content -->
    <div class="topnav">
        <nav class="navbar navbar-custom navbar-expand-md bg-transparent justify-content-center">
            <p id="date" style="text-align: center"></p>
            <a href="/" class="navbar-brand d-flex w-50 mr-auto"></a>
            {{-- <div  class="navbar-collapse collapse w-100" id="collapsingNavbar3">
                <ul class="navbar-nav w-100 justify-content-center">
                    <li class="nav-item {{ ($title === "Home") ? 'active' : '' }}">
                        <a class="nav-link " href="/">HOME</a>
                    </li>
                    <li class="nav-item {{ ($title === "Menu") ? 'active' : '' }}">
                        <a class="nav-link " href="/menu" >MENU</a>
                    </li>
                    <li class="nav-item {{ ($title === "About Us") ? 'active' : '' }}">
                        <a class="nav-link " href="/about">ABOUT US</a>
                    </li>
                    <li class="nav-item {{ ($title === "FaQ") ? 'active' : '' }}">
                        <a class="nav-link " href="/faqs">FAQS</a>
                    </li>
                </ul> --}}
            {{-- <a class="text-reset me-3" href="/sign-in">
                    <i style="color: #ffffff;" class="fas fa-shopping-cart"></i>
                  </a>
                  <a
                    style="padding-right: 18%;"
                    class="dropdown-toggle d-flex align-items-center hidden-arrow"
                    href="#"
                    id="navbarDropdownMenuLink"
                    role="button"
                    data-mdb-toggle="dropdown"
                    aria-expanded="false"
                  > --}}
            <i class="fas fa-user" style="color: #e5e5e5;"></i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                <li>
                    <a style="text-align: left; color: black;" class="dropdown-item" href="/sign-in">Sign In</a>
                </li>
                <li>
                    <a style="text-align: left; color: black;" class="dropdown-item" href="/sign-up">Sign Up</a>
                </li>
            </ul>

        </nav>
    </div>
</body>

</html>
