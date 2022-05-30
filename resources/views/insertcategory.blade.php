@include('header')
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href={{ asset('css/category.css') }} type="text/css" />
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
    <h5 class=title>Category List</h5>

    <h5 class=title>Insert Transaction</h5>
    <div class="baris1" style="z-index: 1000">
        <h4 class="datetitle">Date</h4>
        <input class="btn btn-sm calendar" style="text-transform:unset !important; width: 200px;" type="date">

        <h4 class="platformtitle" >Platform</h4>
        <form method="get">
            @csrf
            <div class="dropdown-show2" >
                <select class="dropdowncat" id="cat" name="selectplatform"
                    style="text-transform:unset !important; width: 200px; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <option value="">Select Platform</option>
                    <option value="tokopedia">Tokopedia</option>
                    <option value="shopee">Shopee</option>
                </select>
            </div>
        </form>
    </div>

    <div class="baris3">
        <div class="buttonadd">
            <button type="button" class="btn btn-secondary btn-sm" style="text-transform: unset !important; width: 150px; ">Add</button>
        </div>
    </div>

    <div class=table>
        <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 140px;">
            <thead>
                <tr>
                    <th scope="col" style="font-weight: 700; text-align:left;">Category ID</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Category Name</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Total Product</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($cat as $c)
                    <tr>
                        <td style="font-weight: 600; text-align:left;">{{ $c->ID_CATEGORY }}</td>
                        <td style="font-weight: 600; text-align:left;">{{ $c->C_NAME }}</td>
                        <td style="font-weight: 600; text-align:left;">{{ $c->TOTAL_PRODUCT }}</td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</body>

</html>
