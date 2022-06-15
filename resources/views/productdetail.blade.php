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

    @if (session()->has('message'))
        <div class="alert alert-warning alert-dismissible fade show">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            {{ session()->get('message') }}
        </div>
    @endif

    <form action="/deleteprod" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <div class="baris1">SKU</div>
        <div class="boxsku">
            <input type="text" id="sku" name="sku" value="{{ $product->SKU }}" class="form-control btn btn-sm"
                placeholder="SKU" style="text-transform:unset !important; width: 310px; text-align: center;" readonly>
        </div>

        <div class="baris2">Name</div>
        <div class="boxname">
            <input type="text" id="name" name="name" value="{{ $product->P_NAME }}" class="form-control btn btn-sm"
                placeholder="Name" style="text-transform:unset !important; width: 310px; text-align: center;">
        </div>

        <div class="baris3">Category</div>
        <div class="boxcat">
            <input type="text" id="cat" name="cat" value="{{ $cat2->ID_CATEGORY }} - {{ $cat2->C_NAME }}" class="form-control btn btn-sm"
                placeholder="Name" style="text-transform:unset !important; width: 310px; text-align: center;" readonly>
        </div>

        <div class="baris4-1">Price</div>
        <div class="boxprice">
            <input type="text" id="price" name="price" value="Rp {{ $product->PRICE }}"
                class="form-control btn btn-sm" placeholder="Price"
                style="text-transform:unset !important; width: 150px; text-align: center;">
        </div>

        <div class="baris4-2">Qty</div>
        <div class="boxqty">
            <input type="number" id="qty" name="qty" value="{{ $product->STOCK }}" class="form-control btn btn-sm"
                placeholder="Qty" style="text-transform:unset !important; width: 70px; text-align: center;">
        </div>

        <div class="baris5">Size</div>
        <div class="boxsize">
            <input type="text" id="size" name="size" value="{{ $product->SIZE }} ml" class="form-control btn btn-sm"
            placeholder="Size" style="text-transform:unset !important; width: 310px; text-align: center;" readonly>
        </div>

        <div class="baris6">Description</div>
        <div class="boxdesc">
            <textarea name="desc" id="desc" cols="30" rows="3"
                style="text-transform:unset !important; width: 310px; height: 70px; text-align: left; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;">
                {{ $product->DESCRIPTION }}
            </textarea>
        </div>

        <button onclick="return confirm('Are you sure?')" type="submit" class="buttondel" name="action"
            value="delete" style="background-color: #f7f7f7">Delete</button>
        <button onclick="return confirm('Are you sure?')" type="submit" class="buttonins" name="action"
            value="edit" style="background-color: #dee1e6">Edit</button>

        <input type="hidden" name="oldImage" value="{{ $product->IMAGE }}">
        @if ($product->IMAGE)
            <div class="productphoto">
                <img id="frame" class="photo" src="../images/best/{{ $product->SKU }}.jpg"
                    value="{{ $product->IMAGE }}" name="image1">
            </div>
        @else
            <div class="productphoto">
                <img id="frame" src="" class="img-responsive">
            </div>
        @endif

        <input class="buttonimg" type="file" id="formFile" name="image" onchange="preview()">
    </form>

    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>
