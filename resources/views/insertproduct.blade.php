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

    <form action="/create" method="POST" enctype="multipart/form-data" class="form">
        @csrf
        <div class="baris1">SKU</div>
        <div class="boxsku">
            <input type="text" id="sku" name="sku" class="form-control btn btn-sm"
                style="text-transform:unset !important; width: 310px; text-align: center;" readonly>
        </div>

        <div class="baris2">Name</div>
        <div class="boxname">
            <input type="text" id="name" name="name" class="form-control btn btn-sm" required
                style="text-transform:unset !important; width: 310px; text-align: center;">
        </div>

        <div class="baris3">Category</div>
        <div class="boxcat">
            <select class="dropdowncat" id="cat" name="cat" required
                style="text-transform:unset !important; width: 310px; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @foreach ($cat as $c)
                    <option value="{{ $c->cat }}">{{ $c->cat }} </option>
                @endforeach
                {{-- <option value="A">Cleaner</option>
                <option value="B">Protector</option>
                <option value="C">Coating Factory</option>
                <option value="D">Tools</option> --}}
            </select>
        </div>

        <div class="baris4-1">Price</div>
        <div class="boxprice">
            <input type="text" id="price" name="price" class="form-control btn btn-sm" required
                style="text-transform:unset !important; width: 150px; text-align: center;">
        </div>

        <div class="baris4-2">Qty</div>
        <div class="boxqty">
            <input type="number" id="qty" name="qty" class="form-control btn btn-sm" required
                style="text-transform:unset !important; width: 70px; text-align: center;">
        </div>

        <div class="baris5">Size</div>
        <div class="boxsize">
            <select required class="dropdownsize" id="size" name="size"
                style="text-transform:unset !important; width: 310px; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                @foreach ($size as $s)
                    <option value="{{ $s->SIZE }}">{{ $s->SIZE }} ml</option>
                @endforeach
            </select>
        </div>

        <div class="baris6">Description</div>
        <div class="boxdesc">
            <textarea name="desc" id="desc" cols="30" rows="3" required="required"
                style="text-transform:unset !important; width: 310px; height: 70px; text-align: left; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"></textarea>
        </div>

        <button onclick="return confirm('Are you sure?')" type="reset" class="buttondel" name="action" value="Reset"
            style="background-color: #f7f7f7">Delete All</button>
        <button onclick="return confirm('Are you sure?')" type="submit" class="buttonins" name="action" value="insert"
            style="background-color: #dee1e6">Insert</button>

        <input class="buttonimg" type="file" id="formFile" name="image" onchange="preview()" required>
        <div class="productphoto">
            <img id="frame" src="" class="img-responsive">
        </div>
    </form>

    <script>
        function preview() {
            frame.src = URL.createObjectURL(event.target.files[0]);
        }
    </script>

</body>

</html>
