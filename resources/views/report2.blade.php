<!DOCTYPE html>

<html>
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<head>
</head>

@include('header')
<body>
    <h5 class=title>Report</h5>
    <form action="/report2" method="get">
        @csrf
        <div class="dropdown-show" name="">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Select Report
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <button class="dropdown-item" type="submit" value="product_sales" name="select_report">Product Sales</button>
                <button class="dropdown-item" type="submit" value="finance" name="select_report">Finance</button>
            </div>
        </div>
    </form>

    <form action="/report2" method="get">
        @csrf
        <div class="dropdown-show2" name="">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Select Platform
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <button class="dropdown-item" type="submit" value="all" name="select_platform">All</button>
                <button class="dropdown-item" type="submit" value="shopee" name="select_platform">Shopee</button>
                <button class="dropdown-item" type="submit" value="tokopedia" name="select_platform">Tokopedia</button>
            </div>
        </div>
    </form>
    <form action="/report2" method="get">
        @csrf
        <div class="dropdown-show3" name="">
            <a class="btn btn-sm dropdown-toggle dropdown-toggle-split"
                style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                Select Period
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <button class="dropdown-item" type="submit" value="all" name="select_period">All</button>
                <button class="dropdown-item" type="submit" value="seven" name="select_period">Last 7 Days</button>
                <button class="dropdown-item" type="submit" value="thirty" name="select_period">Last 30 Days</button>
            </div>
        </div>
    </form>

    <div class="income">
        <h5 style="font-weight: 600;">Total Income</h5>
        <div class="subtitle-income">
            Gross Profit
        </div>
        <div class="subvalue-income">
            Rp10.000.000
        </div>
        <br>
        <div class="subtitle-income">
            Net Profit
        </div>
        <div class="subvalue-income">
            Rp7.500.000
        </div>
    </div>
    <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 464px;">
        <thead>
          <tr>
            <th scope="col" style="font-weight: 600; text-align:left;">Platform</th>
            <th scope="col" style="font-weight: 600; text-align:center;">Month</th>
            <th scope="col" style="font-weight: 600; text-align:right;">Net Profit</th>
            <th scope="col" style="font-weight: 600; text-align:right;">Operational Fee</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <th scope="row" style="text-align:left;">{{$d->PLATFORM}}</th>
                <td style="text-align:center;">{{$d->MONTH}}</td>
                <td style="text-align:right;">{{$d->NET_PROFIT}}</td>
                <td style="text-align:right;">{{$d->OPERATIONAL_FEE}}</td>
              </tr>
            @endforeach
        </tbody>
      </table>
</body>

</html>
