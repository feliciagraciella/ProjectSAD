<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
    {{-- <link rel="stylesheet" href={{ asset('css/home.css') }} type="text/css" /> --}}
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
    <script src="https://code.highcharts.com/highcharts.js">
    </script>
</head>

@include('header')

<body>
    <h5 class="title">Report</h5>
    <form action="/report2" method="GET">
        @csrf
        <div class="dropdown-show" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_report" style="text-transform:unset !important;"
                role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                    <option value="" disabled selected hidden>Select Report</option>
                    <option class="dropdown-item" type="submit" value="Product Sales" style="font-size:12px">Product
                        Sales</option>
                    <option class="dropdown-item" type="submit" value="Finance" style="font-size:12px">Finance</option>
                {{-- </div> --}}
            </select>
        </div>


        <div class="dropdown-show2" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_platform" style="text-transform:unset !important;"
                role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                    <option value=""  disabled selected hidden>Select Platform</option>
                    <option class="dropdown-item" type="submit" value="All" style="font-size:12px">All</option>
                    <option class="dropdown-item" type="submit" value="Shopee" style="font-size:12px">Shopee</option>
                    <option class="dropdown-item" type="submit" value="Tokopedia" style="font-size:12px">Tokopedia
                    </option>
                {{-- </div> --}}
            </select>
        </div>

        <div class="dropdown-show3" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_period" style="text-transform:unset !important;"
                role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                    <option value="" disabled selected hidden>Select Period</option>
                    <option class="dropdown-item" type="submit" value="All" style="font-size:12px">All</option>
                    <option class="dropdown-item" type="submit" value="Last 7 Days" style="font-size:12px">Last 7 Days</option>
                    <option class="dropdown-item" type="submit" value="Last 30 Days" style="font-size:12px">Last 30 Days</option>
                {{-- </div> --}}
            </select>
        </div>
        <div class="button-apply">
            <button type="submit" class="btn btn-dark btn-sm" name="action" value="apply" style="text-transform: unset !important;">Apply</button>
        </div>
    </form>

    {{-- <div class="income">
        <h5 style="font-weight: 600;">Total Income</h5>
        <div class="subtitle-income">
            Net Profit
        </div>
        <div class="subvalue-income">
            Rp{{$income}}
        </div>
        <br>
        <div class="subtitle-income">
            Platform Fee
        </div>
        <div class="subvalue-income">
            Rp{{$admin}}
        </div>
    </div> --}}
    <div class="finance-report">
        <h3>Finance</h3>
        {{-- <h4>&nbsp(Last 7 Days)</h4> --}}
        <div class="netprofit" style="left: 80%; position: absolute; top: 225px;">
            <p class="finance1">
                <span class="iconify" data-icon="dashicons:money-alt" style="color: black; "></span>
            </p>
            <h5 class="netprofit-text">Net&nbspProfit</h5>
            <h5 class="netprofit-amt">Rp{{ $income }}</h5>
        </div>
        <div class="plat-fee" style="left: 80%; position: absolute; top: 275px;">
            <p class="finance1">
                <span class="iconify" data-icon="dashicons:money-alt" style="color: black; "></span>
            </p>
            <h5 class="fee-text">Platform&nbspFee</h5>
            <h5 class="fee-amt">Rp{{ $admin }}</h5>
        </div>
    </div>
    <div class="subtitle-report">
        Total Sold: {{$totalsold}} pcs
    </div>
    <table class="table" style="width: 70%; position: absolute; left: 320px; top: 624px;">
        <thead>
            <tr>
                <th scope="col" style="font-weight: 600; text-align:center;">Photo</th>
                <th scope="col" style="font-weight: 600; text-align:center; width: 100px;">SKU</th>
                <th scope="col" style="font-weight: 600; text-align:center; width: 168px;">Name</th>
                <th scope="col" style="font-weight: 600; text-align:center; width: 120px;">Size</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Total Sale</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Price</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Income</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $d)
            <tr>
                <th scope="row" style="text-align:center;"><img src="{{ asset('images/best/' . $d->IMAGE) }}" alt=""
                        height=100 width=100></th>
                <td style="text-align:center;">{{$d->SKU}}</td>
                <td style="text-align:left;">{{$d->PRODUCT_NAME}}</td>
                <td style="text-align:center;">{{$d->SIZE}} ml</td>
                <td style="text-align:center;">{{$d->TOTAL_SOLD}}</td>
                <td style="text-align:center;">{{$d->PRICE}}</td>
                <td style="text-align:center;">{{$d->INCOME}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{-- <div class="pagination-button">
        {{ $data->links() }}
    </div> --}}
    <div id="reportchart"></div>
    <script src="https://code.highcharts.com/highcharts.js">
    </script>
<script>
    Highcharts.chart('reportchart', {
        chart: {
            type: 'column'
        },
        title: {
            text: {!!json_encode($reportname)!!}
            // text: "halo"
        },
        subtitle: {
            text: {!!json_encode($reportsub)!!}
            // text: "halo"
        },
        xAxis: {
            categories: {!!json_encode($namaproduk)!!},
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Sold (pcs)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0;">{xAxis.categories}</td>' +
                '<td style="padding:0"><b>{point.y} pcs</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.1,
                borderWidth: 0
            }
        },
        series: [{
            name: {!!json_encode($platform)!!},
            data: {!!json_encode($jumlahproduk)!!},
            color: {!!json_encode($color)!!}
        }]
    });
</script>
</body>

</html>
