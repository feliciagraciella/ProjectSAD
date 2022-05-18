@include('header')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href={{ asset('css/insertproduct.css') }} type="text/css" />
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
    <h5 class=title>Insert Product</h5>
    <form class="form-insert" action="/action_page.php">
        <div class="barisganjil">
            <label for="fname">SKU</label>
            <input type="text" id="sku" name="sku"><br><br>
        </div>
        <div class="barisgenap">
            <label for="lname">Name</label>
            <input type="text" id="name" name="name"><br><br>
        </div>
        <div class="barisganjil">
            <label for="lname">Category</label>
            <input type="text" id="cat" name="cat"><br><br>
            {{-- <select id="country" name="country">
                <option value="australia">Australia</option>
                <option value="canada">Canada</option>
                <option value="usa">USA</option>
              </select> --}}
        </div>
        <div class="barisgenap">
            <label for="lname">Price</label>
            <input type="text" id="price" name="price"><br><br>
        </div>
        <div class="barisganjil">
            <label for="lname">Qty</label>
            <input type="text" id="qty" name="qty"><br><br>
        </div>
        <div class="barisgenap">
            <label for="lname">Size</label>
            <input type="text" id="size" name="size"><br><br>
        </div>
        <div class="barisganjil">
            <label for="lname">Description</label>
            <input type="text" id="desc" name="desc"><br><br>
        </div>
        <button type="submitdel" class="button" name="deleteall" value="bar" style="background-color: #f7f7f7">Delete All</button>
        <button type="submitins" class="button" name="insert" value="bar" style="background-color: #dee1e6">Insert</button>
    </form>
</body>

</html>
