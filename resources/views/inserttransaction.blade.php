@include('header')
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href={{ asset('css/inserttransaction.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>


</head>

<body>
    <h5 class=title>Insert Transaction</h5>
    <div class="baris1" style="z-index: 1000">
        <h4 class="datetitle">Date</h4>
        <input class="btn btn-sm calendar" style="text-transform:unset !important;" type="date">

        <h4 class="platformtitle" >Platform</h4>
        <div class="dropdown-show2">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#" style="text-transform:unset !important; width: 150px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Platform
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" style="font-size: smaller;" href="#">All</a>
              <a class="dropdown-item" style="font-size: smaller;" href="#">Tokopedia</a>
              <a class="dropdown-item" style="font-size: smaller;" href="#">Shopee</a>
            </div>
        </div>
    </div>

    <div class="baris2">
        <h4 class="datetitle">Product</h4>
        <div class="dropdown-show3">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#" style="text-transform:unset !important; width: 150px; " role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Select Product
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" style="font-size: smaller;" href="#">Cleaner 1</a>
              <a class="dropdown-item" style="font-size: smaller;" href="#">Cleaner 2</a>
              <a class="dropdown-item" style="font-size: smaller;" href="#">Cleaner 3</a>
            </div>
        </div>

        <h4 class="platformtitle">Quantity</h4>
        <div class="numericupdown">
            <input class="form-control btn btn-sm d-inline text-center me-3 txtJumlah" name="inputQuantity" min=0 type="number" value="0" style="width: 150px;">
        </div>
    </div>

    <div class="baris3">
        <div class="buttonadd">
            <button type="button" class="btn btn-secondary btn-sm" style="text-transform: unset !important; width: 150px; ">Add</button>
        </div>
    </div>

    <div class=table>
        <table class="table" style="width: 70%; position: absolute; left: 320px; top: 380px; overflow-y:scroll;">
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
              <tr>
                <td style="font-weight: 600; text-align:left;">T20220315</td>
                <td style="font-weight: 600; text-align:left;">20220315</td>
                <td style="font-weight: 600; text-align:left;">Shopee</td>
                <td style="font-weight: 600; text-align:left;">Cleaner 1</td>
                <td style="font-weight: 600; text-align:left;">2</td>
                <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center; margin-right:30px;" class="close">&#10005;</span></td>
              </tr>
              <tr>
                <td style="font-weight: 600; text-align:left;">T20220315</td>
                <td style="font-weight: 600; text-align:left;">20220315</td>
                <td style="font-weight: 600; text-align:left;">Shopee</td>
                <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                <td style="font-weight: 600; text-align:left;">2</td>
                <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center; margin-right:30px;" class="close">&#10005;</span></td>
              </tr>
              <tr>
                <td style="font-weight: 600; text-align:left;">T20220315</td>
                <td style="font-weight: 600; text-align:left;">20220315</td>
                <td style="font-weight: 600; text-align:left;">Shopee</td>
                <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                <td style="font-weight: 600; text-align:left;">2</td>
                <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center; margin-right:30px;" class="close">&#10005;</span></td>
              </tr>
              <tr>
                <td style="font-weight: 600; text-align:left;">T20220315</td>
                <td style="font-weight: 600; text-align:left;">20220315</td>
                <td style="font-weight: 600; text-align:left;">Shopee</td>
                <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                <td style="font-weight: 600; text-align:left;">2</td>
                <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center; margin-right:30px;" class="close">&#10005;</span></td>
              </tr>
              <tr>
                <td style="font-weight: 600; text-align:left;">T20220315</td>
                <td style="font-weight: 600; text-align:left;">20220315</td>
                <td style="font-weight: 600; text-align:left;">Shopee</td>
                <td style="font-weight: 600; text-align:left;">Cleaner 2</td>
                <td style="font-weight: 600; text-align:left;">2</td>
                <td style="font-weight: 600; text-align:left; width: 10%;"><span style="text-align:center; margin-right:30px;" class="close">&#10005;</span></td>
              </tr>
            </tbody>
        </table>
    </div>

    <div class="totaltransaction">
        <h4 class="totalfee" style="width: 150px;">Total Transaction</h4>
        <div class="inputtotaltrans">
            <input type="text" class="form-control btn btn-sm" style="text-transform:unset !important; width: 200px; text-align: right;" placeholder="Enter value">
        </div>
    </div>

    <div class="totalplatfee">
        <h4 class="totalfee" style="width: 150px;">Total Platform Fee</h4>
        <div class="inputtotalfee">
            <input type="text" class="form-control btn btn-sm" style="text-transform:unset !important; width: 200px; text-align: right;
            text-align:right;" placeholder="Enter value">
        </div>
    </div>

    <hr class="hrhasil">

    <div class="totalakhir">
        <h4 class="totalfee" style="width: 150px;">Total</h4>
        <h4 class="totalakhirr" style="width: 150px;">Rp. 500.000</h4>
    </div>

    <div class="buttonbutton">
        <div class="buttondelete">
            <button type="button" class="btn btn-outline-secondary btn-sm" style="text-transform: unset !important; width: 120px; ">Delete All</button>
        </div>
        <div class="buttoninsert">
            <button type="button" class="btn btn-secondary btn-sm" style="text-transform: unset !important; width: 120px; ">Insert</button>
        </div>
    </div>
</body>

</html>
