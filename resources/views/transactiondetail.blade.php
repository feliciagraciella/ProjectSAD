@include('header')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href={{ asset('css/transactiondetail.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

</head>

<body>
    <h5 class=title>Transaction Detail</h5>


    <div class="table" style="padding-left: 320px; transform:translateY(140px);">
        <table class="table" style="width: 90%;">
            <thead>
                <tr>
                    <th scope="col" style="font-weight: 700; text-align:left;">Transaction ID</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">SKU</th>
                    <th scope="col" style="font-weight: 700; text-align:left;">Quantity</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($transdet as $td)
                <tr>
                    <td style="font-weight: 600; text-align:left;">{{$td -> ID_TRANSACTION}}</td>
                    <td style="font-weight: 600;text-align:left;">{{$td -> SKU}}</td>
                    <td style="font-weight: 600;text-align:left;">{{$td -> QTY_PRODUCT}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="totaltransaction">
        <h4 class="totalfee" style="width: 150px;">Total Transaction</h4>

        {{-- <div class="inputtotaltrans"> --}}
        <h4  class="inputtotaltrans" style="width: 150px; text-align: right;">Rp. 500.000</h4>
            {{-- <input type="text" class="form-control btn btn-sm" style="text-transform:unset !important; width: 200px; text-align: right;" placeholder="Enter value"> --}}
        {{-- </div> --}}
    </div>

    <div class="totalplatfee">
        <h4 class="totalfee" style="width: 150px;">Total Platform Fee</h4>
        <h4  class="inputtotaltrans" style="width: 150px; text-align: right;">Rp. 500.000</h4>
        {{-- <div class="inputtotalfee">
            <input type="text" class="form-control btn btn-sm" style="text-transform:unset !important; width: 200px; text-align: right;
            text-align:right;" placeholder="Enter value">
        </div> --}}
    </div>

    <hr class="hrhasil">

    <div class="totalakhir">
        <h4 class="totalfee" style="width: 150px;">Total</h4>
        <h4 class="inputtotaltrans" style="width: 150px;">Rp. 500.000</h4>
    </div>

</body>

</html>
