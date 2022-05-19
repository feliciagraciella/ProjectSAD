@include('header')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href={{ asset('css/product.css') }} type="text/css" />
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
    <h5 class=title>Products List</h5>
    <div class="baris1">

        <div class="dropdown-show2">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#"
                style="text-transform:unset !important; width: 150px; " role="button" id="dropdownMenuLink"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sort By
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a class="dropdown-item" style="font-size: smaller;" href="#">Price</a>
                <a class="dropdown-item" style="font-size: smaller;" href="#">Qty</a>
                <a class="dropdown-item" style="font-size: smaller;" href="#">Size</a>
            </div>
        </div>
        <a class="viewcat" href="#">View Category</a>
    </div>

    <div class=table>
        <table class="table" style="width: 70%; position: absolute; left: 320px; top: 250px;">
            <thead>
                <tr>
                    <th scope="col" style="font-weight: 700; text-align:left;">Transaction ID</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Date</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Platform</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Product</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Quantity</th>
                    <th scope="col" style="font-weight: 700; text-align:left;"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($product as $p)
                <tr>
                    <td style="font-weight: 600; text-align:left;">{{$p->SKU}}</td>
                    <td style="font-weight: 600; text-align:left;">20220315</td>
                    <td style="font-weight: 600; text-align:left;">Shopee</td>
                    <td style="font-weight: 600; text-align:left;">Cleaner 1</td>
                    <td style="font-weight: 600; text-align:left;">2</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
                @endforeach
                <tr>
                    <td style="font-weight: 600; text-align:left;">T20220315</td>
                    <td style="font-weight: 600; text-align:left;">20220315</td>
                    <td style="font-weight: 600; text-align:left;">Shopee</td>
                    <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                    <td style="font-weight: 600; text-align:left;">2</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; text-align:left;">T20220315</td>
                    <td style="font-weight: 600; text-align:left;">20220315</td>
                    <td style="font-weight: 600; text-align:left;">Shopee</td>
                    <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                    <td style="font-weight: 600; text-align:left;">2</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; text-align:left;">T20220315</td>
                    <td style="font-weight: 600; text-align:left;">20220315</td>
                    <td style="font-weight: 600; text-align:left;">Shopee</td>
                    <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                    <td style="font-weight: 600; text-align:left;">2</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; text-align:left;">T20220315</td>
                    <td style="font-weight: 600; text-align:left;">20220315</td>
                    <td style="font-weight: 600; text-align:left;">Shopee</td>
                    <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                    <td style="font-weight: 600; text-align:left;">2</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
                <tr>
                    <td style="font-weight: 600; text-align:left;">T20220315</td>
                    <td style="font-weight: 600; text-align:left;">20220315</td>
                    <td style="font-weight: 600; text-align:left;">Shopee</td>
                    <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                    <td style="font-weight: 600; text-align:left;">2</td>
                    <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center;"
                            class="close">&#10005;</span></td>
                </tr>
            </tbody>
        </table>
    </div>

    {{-- <div>class="plus" --}}
</body>

</html>
