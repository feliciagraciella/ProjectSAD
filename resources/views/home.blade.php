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
    <link rel="stylesheet" href={{ asset('css/home.css') }} type="text/css" />
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
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
    </button>

    <div class="sidenav">
        <a href="/home">
            <img class="logo" src={{ asset('images/logo.png') }} style="height: 130px;" alt="Logo" />
        </a>
        <div class="sidenav-menu">
            <a href="/product">Products List</a>
            <a href="/transaction">Transaction List</a>
            <a href="/report">Reports</a>
        </div>
        <p class="copyright">© 2022 Copyright | Best Auto Care Solution</p>
    </div>

    <div class="topbar">
        <div class="date" style="text-align: center">
            <script>
                date = new Date().toLocaleDateString();
                document.write(date);
            </script>
        </div>
        <div class="profile-id">
            <a style="padding-right: 18%; float: right; margin-top: 5px"
                class="dropdown-toggle d-flex align-items-center hidden-arrow" href="#" id="navbarDropdownMenuLink"
                role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                <i class="fas fa-user" style="color: black; position: fixed;">
                    <p style="font-family: Poppins; margin-left: 5px; float: right;"> A001 </p>
                </i>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink"
                style="position: fixed;">
                <li>
                    <a style="text-align: left; color: black; position: fixed; right: -150px;" class="dropdown-item"
                        href="/login">Log Out</a>
                </li>
            </ul>
        </div>
        <hr class="topbar-hr">
    </div>

    <div class="report">
        <h3>Monthly Report</h3>
        <div class="column-report">
            <div class="rect-tokped">

            </div>
        </div>
        <div class="column-report">
            <div class="rect-shopee">

            </div>
        </div>
    </div>

    <div class="popular-products">
        <h3>Most Popular Products</h3>
        <div class="column-popular">
            <div class="rect1">

            </div>
        </div>
        <div class="column-popular">
            <div class="rect2">

            </div>
        </div>
        <div class="column-popular">
            <div class="rect3">

            </div>
        </div>
        <div class="column-popular">
            <div class="rect4">

            </div>
        </div>
    </div>

    <div class="all-products">
        <h3>All Products</h3>
    </div>
    <table class="table table-hover" style="width: 52%; position: absolute; left: 300px; top: 535px;">
        <thead>
            <tr>
                <th scope="col" style="font-weight: 600; text-align:center;">Photo</th>
                <th scope="col" style="font-weight: 600; text-align:center;">SKU</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Name</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Total Sale</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Size</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row" style="text-align:center;">1</th>
                <td style="text-align:center;">20220315</td>
                <td style="text-align:left;">Cleaner Bagus</td>
                <td style="text-align:center;">5</td>
                <td style="text-align:center;">200 ml</td>
                <td style="text-align:center;">Rp100.000</td>
            </tr>
            <tr>
                <th scope="row" style="text-align:center;">1</th>
                <td style="text-align:center;">20220315</td>
                <td style="text-align:left;">Cleaner Bagus</td>
                <td style="text-align:center;">5</td>
                <td style="text-align:center;">200 ml</td>
                <td style="text-align:center;">Rp100.000</td>
            </tr>
            <tr>
                <th scope="row" style="text-align:center;">1</th>
                <td style="text-align:center;">20220315</td>
                <td style="text-align:left;">Cleaner Bagus</td>
                <td style="text-align:center;">5</td>
                <td style="text-align:center;">200 ml</td>
                <td style="text-align:center;">Rp100.000</td>
            </tr>
            <tr>
                <th scope="row" style="text-align:center;">1</th>
                <td style="text-align:center;">20220315</td>
                <td style="text-align:left;">Cleaner Bagus</td>
                <td style="text-align:center;">5</td>
                <td style="text-align:center;">200 ml</td>
                <td style="text-align:center;">Rp100.000</td>
            </tr>
            <tr>
                <th scope="row" style="text-align:center;">1</th>
                <td style="text-align:center;">20220315</td>
                <td style="text-align:left;">Cleaner Bagus</td>
                <td style="text-align:center;">5</td>
                <td style="text-align:center;">200 ml</td>
                <td style="text-align:center;">Rp100.000</td>
            </tr>
        </tbody>
    </table>

</body>

</html>