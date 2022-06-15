<!DOCTYPE html>

<html>
<link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
<link rel="stylesheet" href={{ asset('css/home.css') }} type="text/css" />
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

<head>
</head>

@include('header')

<body>
    <h5 class=title>Report</h5>
    <form action="/report2" method="GET">
        @csrf
        <div class="dropdown-show" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_report"
                style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                <option value="" disabled selected hidden>Select Report</option>
                <option class="dropdown-item" type="submit" value="Product Sales" style="font-size:12px;">Product
                    Sales</option>
                <option class="dropdown-item" type="submit" value="Finance" style="font-size:12px;">Finance</option>
                {{-- </div> --}}
            </select>
        </div>


        <div class="dropdown-show2" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_platform"
                style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                <option value="" disabled selected hidden>Select Platform</option>
                <option class="dropdown-item" type="submit" value="All" style="font-size:12px">All</option>
                <option class="dropdown-item" type="submit" value="Shopee" style="font-size:12px">Shopee</option>
                <option class="dropdown-item" type="submit" value="Tokopedia" style="font-size:12px">Tokopedia
                </option>
                {{-- </div> --}}
            </select>
        </div>

        <div class="dropdown-show3" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_period"
                style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                <option value="" disabled selected hidden>Select Period</option>
                <option class="dropdown-item" type="submit" value="All" style="font-size:12px">All</option>
                <option class="dropdown-item" type="submit" value="Last 7 Days" style="font-size:12px">Last 7 Days</option>
                <option class="dropdown-item" type="submit" value="Last 30 Days" style="font-size:12px">Last 30 Days</option>
                {{-- </div> --}}
            </select>
        </div>
        <div class="button-apply">
            <button type="submit" class="btn btn-dark btn-sm" name="action" value="apply"
                style="text-transform: unset !important;">Apply</button>
        </div>
    </form>

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
    {{-- <div class="subtitle-report">
        {{$reportname}}
    </div> --}}
    <table class="table" style="width: 70%; position: absolute; left: 320px; top: 624px;">
        <thead>
            <tr>
                <th scope="col" style="font-weight: 600; text-align:left;">Platform</th>
                <th scope="col" style="font-weight: 600; text-align:center;">Date</th>
                <th scope="col" style="font-weight: 600; text-align:right;">Net Profit</th>
                <th scope="col" style="font-weight: 600; text-align:right;">Operational Fee</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data1 as $d)
            <tr>
                <th scope="row" style="text-align:left;">{{$d->PLATFORM}}</th>
                <td style="text-align:center;">{{$d->DATE_TRANSACTION}}</td>
                <td style="text-align:right;">{{$d->NET_PROFIT}}</td>
                <td style="text-align:right;">{{$d->OPERATIONAL_FEE}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div id="reportchart"></div>
    <script src="https://code.highcharts.com/highcharts.js">
    </script>
    <script>
        Highcharts.chart('reportchart', {

            title: {
                text: {!!json_encode($reportname)!!}
            },

            subtitle: {
                text: {!!json_encode($reportsub)!!}
            },

            yAxis: {
                title: {
                    text: "Profit (Rp)"
                }
            },

            xAxis: {
                categories: {!!json_encode($tanggal1)!!},
                crosshair: true
            },

            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle'
            },

            plotOptions: {
                series: {
                    label: {
                        connectorAllowed: false
                    }
                }
            },
            series: [{
                    name: {!!json_encode($platform1)!!},
                    data: {!!json_encode($intprofit1)!!},
                    color: {!!json_encode($color1)!!},

            },
            {
                    name: {!!json_encode($platform2)!!},
                    data: {!!json_encode($intprofit2)!!},
                    color: {!!json_encode($color2)!!},

            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            layout: 'horizontal',
                            align: 'center',
                            verticalAlign: 'bottom'
                        }
                    }
                }]
            }

        });
    </script>
</body>

</html>
