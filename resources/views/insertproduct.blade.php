@include('header')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href={{ asset('css/productdetail.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>


</head>

<body>
    <h5 class=title>Product Detail</h5>
    <div class="baris1">SKU</div>
    <div class="boxsku">
        <input type="text" class="form-control btn btn-sm"
            style="text-transform:unset !important; width: 310px; text-align: center;" >
    </div>

    <div class="baris2">Name</div>
    <div class="boxname">
        <input type="text" class="form-control btn btn-sm"
            style="text-transform:unset !important; width: 310px; text-align: center;" >
    </div>

    <div class="baris3">Category</div>
    <div class="boxcat">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#"
            style="text-transform:unset !important; width: 310px; text-align: right;" role="button"
            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" style="font-size: smaller;" href="#">Cleaner</a>
            <a class="dropdown-item" style="font-size: smaller;" href="#">Protect</a>
            <a class="dropdown-item" style="font-size: smaller;" href="#">Tools</a>
        </div>
    </div>

    <div class="baris4-1">Price</div>
    <div class="boxprice">
        <input type="text" class="form-control btn btn-sm"
            style="text-transform:unset !important; width: 150px; text-align: center;">
    </div>

    <div class="baris4-2">Qty</div>
    <div class="boxqty">
        <input type="text" class="form-control btn btn-sm"
            style="text-transform:unset !important; width: 70px; text-align: center;">
    </div>

    <div class="baris5">Size</div>
    <div class="boxsize">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#"
            style="text-transform:unset !important; width: 310px; text-align: right;" role="button"
            id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <a class="dropdown-item" style="font-size: smaller;" href="#">30 ml</a>
            <a class="dropdown-item" style="font-size: smaller;" href="#">250 ml</a>
            <a class="dropdown-item" style="font-size: smaller;" href="#">320 ml</a>
            <a class="dropdown-item" style="font-size: smaller;" href="#">500 ml</a>
        </div>
    </div>


    <div class="baris6">Description</div>
    <div class="boxdesc">
        <input type="text" class="form-control btn btn-sm"
            style="text-transform:unset !important; width: 310px; height: 70px; text-align: center;">
    </div>

    <button type="submitdel" class="buttondel" name="deleteall" value="bar"
        style="background-color: #f7f7f7">Delete All</button>
    <button type="submitins" class="buttonins" name="insert" value="bar"
        style="background-color: #dee1e6">Insert</button>

    <div class="productphoto">
        <img class="photo" src={{ asset('images/logo.png') }}>
    </div>
    <button type="submitins" class="buttonimg" name="insert" value="bar"
            style="background-color: #dee1e6">Choose Image</button>

</body>

</html>
