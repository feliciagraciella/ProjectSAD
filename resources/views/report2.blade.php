<!DOCTYPE html>

<html>
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
<head>
</head>

@include('header')
<body>
    <h5 class=title>Report</h5>
    <div class="dropdown-show">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Report
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">Total Sales</a>
          <a class="dropdown-item" href="#">Monthly</a>
          <a class="dropdown-item" href="#">Last 30 Days</a>
          <a class="dropdown-item" href="#">Last 7 Days</a>
        </div>
    </div>
    <div class="dropdown-show2">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Platform
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">All</a>
          <a class="dropdown-item" href="#">Tokopedia</a>
          <a class="dropdown-item" href="#">Shopee</a>
        </div>
    </div>

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
            <th scope="col" style="font-weight: 600; text-align:center;">Transaction ID</th>
            <th scope="col" style="font-weight: 600; text-align:center;">Date</th>
            <th scope="col" style="font-weight: 600; text-align:center;">Platform</th>
            <th scope="col" style="font-weight: 600; text-align:center;">Total Qty</th>
            <th scope="col" style="font-weight: 600; text-align:center;">Total Price</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" style="text-align:center;">T20220315</th>
            <td style="text-align:center;">2022-03-15</td>
            <td style="text-align:center;">Tokopedia</td>
            <td style="text-align:center;">5</td>
            <td style="text-align:center;">Rp500.000</td>
          </tr>
          <tr>
            <th scope="row" style="text-align:center;">T20220315</th>
            <td style="text-align:center;">2022-03-15</td>
            <td style="text-align:center;">Tokopedia</td>
            <td style="text-align:center;">5</td>
            <td style="text-align:center;">Rp500.000</td>
          </tr>
          <tr>
            <th scope="row" style="text-align:center;">T20220315</th>
            <td style="text-align:center;">2022-03-15</td>
            <td style="text-align:center;">Tokopedia</td>
            <td style="text-align:center;">5</td>
            <td style="text-align:center;">Rp500.000</td>
          </tr>
          <tr>
            <th scope="row" style="text-align:center;">T20220315</th>
            <td style="text-align:center;">2022-03-15</td>
            <td style="text-align:center;">Tokopedia</td>
            <td style="text-align:center;">5</td>
            <td style="text-align:center;">Rp500.000</td>
          </tr>
          <tr>
            <th scope="row" style="text-align:center;">T20220315</th>
            <td style="text-align:center;">2022-03-15</td>
            <td style="text-align:center;">Tokopedia</td>
            <td style="text-align:center;">5</td>
            <td style="text-align:center;">Rp500.000</td>
          </tr>
        </tbody>
      </table>
</body>

</html>
