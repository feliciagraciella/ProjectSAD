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
    <script type="text/javascript" src={{ asset('js/product.js') }}></script>
</head>

<body>
    <h5 class=title>Products List</h5>
    <form action="/sortby" method="GET">
        @csrf
    <div class="butinsertproduct">
        <a href="/insertproduct"><button type="button" class="btn btn-outline-secondary btn-sm"
                style="text-transform: unset !important; ">Insert Product <span class="iconify"
                    data-icon="akar-icons:circle-plus-fill"></span></button></a>
    </div>
    <div class="baris1">
        <p class="datetitle" style="margin-top: -12px;">Sort By</p>
        <select class="dropdown-show2" id="sortby" name="sortby"
            style="text-transform:unset !important; width: 150px; transform: translateY(-43px); margin-left: 10%; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <option value="Price">Price</option>
            <option value="Qty">Qty</option>
            <option value="Size">Size</option>
        </select>
        <a class="viewcat" href="/category">View Category</a>
    </div>
    <div class="button-apply">
        <button type="submit" class="btn btn-dark btn-sm" name="action" value="apply" style="text-transform: unset !important;">Apply</button>
    </div>
    </form>

    <div class=table>
        <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 250px;">
            <thead>
                <tr>
                    <th scope="col" style="font-weight: 700; text-align:left;"> Photo</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">SKU</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Category</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Product Name</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Qty</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Size</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $p)
                    <tr>
                        <td style="text-align:center"><img src="../images/best/{{ $p->SKU }}.jpg" alt=""
                                height=70></td>
                        <td style="font-weight: 600; text-align:left;"><a
                                href="{{ 'productdetail/' . $p->SKU }}">{{ $p->SKU }}</a></td>
                        <td style="font-weight: 600; text-align:left;"><a
                                href="{{ 'productdetail/' . $p->SKU }}">{{ $p->ID_CATEGORY }}</td>
                        <td style="font-weight: 600; text-align:left;"><a
                                href="{{ 'productdetail/' . $p->SKU }}">{{ $p->P_NAME }}</td>
                        <td style="font-weight: 600; text-align:left;"><a
                                href="{{ 'productdetail/' . $p->SKU }}">{{ $p->STOCK }}</td>
                        <td style="font-weight: 600; text-align:left;"><a
                                href="{{ 'productdetail/' . $p->SKU }}">{{ $p->SIZE }} ml</td>
                        <td style="font-weight: 600; text-align:left;"><a href="{{ 'productdetail/' . $p->SKU }}">Rp
                                {{ $p->PRICE }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>

</html>
