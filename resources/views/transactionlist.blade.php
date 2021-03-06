@include('header')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href={{ asset('css/transactionlist.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
</head>

<body>
    <h5 class=title>Transaction List</h5>
    <div class="button">
        <a href="/inserttransaction"><button type="button" class="btn btn-outline-secondary btn-sm" style="text-transform: unset !important; ">Insert Transaction <span class="iconify" data-icon="akar-icons:circle-plus-fill"></span></button></a>
    </div>

    <form action="/selectplatform" method="GET">
        @csrf
        <div class="baris1" style="z-index: 1000">
            <h4 class="datetitle">Filter</h4>
            <select class="dropdown-show2" id="sortby" name="sortby"
                style="text-transform:unset !important; width: 150px; margin-left: 10%; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px; position: absolute; top: 50%; transform: translateY(-50%);"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <option value="all">All</option>
                <option value="tokopedia">Tokopedia</option>
                <option value="shopee">Shopee</option>
            </select>

            <div class="button-apply">
                <button type="submit" class="btn btn-dark btn-sm" name="action" value="apply"
                    style="text-transform: unset !important;">Apply</button>
            </div>
        </div>
    </form>

    <div class=table>
        <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 250px;">
            <thead>
              <tr>
                <th scope="col" style="font-weight: 700; text-align:left;">Transaction ID</th>
                <th scope="col" style="font-weight: 700; text-align:left;">Date</th>
                <th scope="col" style="font-weight: 700; text-align:left;">Platform</th>
                <th scope="col" style="font-weight: 700; text-align:left;">Quantity</th>
                <th scope="col" style="font-weight: 700; text-align:left;">Total/day</th>
              </tr>
            </thead>

            <tbody>
                @foreach ($trans as $t)
                {{-- <a href="{{ ('transactiondetail/'.$t->ID_TRANSACTION) }}"> --}}
                <tr>
                    <td style="font-weight: 600; text-align:left;"><a href="{{ ('transactiondetail/'.$t->ID_TRANSACTION) }}">{{ $t -> ID_TRANSACTION }}</a></td>
                    <td style="font-weight: 600; text-align:left;"><a href="{{ ('transactiondetail/'.$t->ID_TRANSACTION) }}">{{ $t -> DATE_TRANSACTION }}</a></td>
                    <td style="font-weight: 600; text-align:left;"><a href="{{ ('transactiondetail/'.$t->ID_TRANSACTION) }}">{{ $t -> PLATFORM }}</a></td>
                    <td style="font-weight: 600; text-align:left;"><a href="{{ ('transactiondetail/'.$t->ID_TRANSACTION) }}">{{ $t -> TOTAL_QTY }}</a></td>
                    <td style="font-weight: 600; text-align:left;"><a href="{{ ('transactiondetail/'.$t->ID_TRANSACTION) }}">{{ $t -> TOTAL_PRICE }}</a></td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>

</body>

</html>
