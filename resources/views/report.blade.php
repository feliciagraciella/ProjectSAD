<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
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
                    <option class="dropdown-item" type="submit" value="Product Sales">Product
                        Sales</option>
                    <option class="dropdown-item" type="submit" value="Finance">Finance</option>
                {{-- </div> --}}
            </select>
        </div>


        <div class="dropdown-show2" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_platform" style="text-transform:unset !important;"
                role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                    <option value=""  disabled selected hidden>Select Platform</option>
                    <option class="dropdown-item" type="submit" value="All">All</option>
                    <option class="dropdown-item" type="submit" value="Shopee">Shopee</option>
                    <option class="dropdown-item" type="submit" value="Tokopedia">Tokopedia
                    </option>
                {{-- </div> --}}
            </select>
        </div>

        <div class="dropdown-show3" name="">
            <select class="btn btn-sm dropdown-toggle dropdown-toggle-split" name="select_period" style="text-transform:unset !important;"
                role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" required>
                {{-- <div class="dropdown-menu" aria-labelledby="dropdownMenuLink"> --}}
                    <option value="" disabled selected hidden>Select Period</option>
                    <option class="dropdown-item" type="submit" value="All">All</option>
                    <option class="dropdown-item" type="submit" value="Last 7 Days">Last 7 Days</option>
                    <option class="dropdown-item" type="submit" value="Last 30 Days">Last 30 Days</option>
                {{-- </div> --}}
            </select>
        </div>
        <div class="button-apply">
            <button type="submit" class="btn btn-dark btn-sm" name="action" value="apply" style="text-transform: unset !important;">Apply</button>
        </div>
    </form>

    <div class="income">
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
    </div>
    <div class="subtitle-report">
        {{$reportname}}
    </div>
    <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 624px;">
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
            text: 'Monthly Average Rainfall'
        },
        xAxis: {
            categories: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Rainfall (mm)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tokyo',
            data: [49.9, 71.5, 106.4, 129.2, 144.0, 176.0, 135.6, 148.5, 216.4, 194.1, 95.6, 54.4]

        }, {
            name: 'New York',
            data: [83.6, 78.8, 98.5, 93.4, 106.0, 84.5, 105.0, 104.3, 91.2, 83.5, 106.6, 92.3]

        }, {
            name: 'London',
            data: [48.9, 38.8, 39.3, 41.4, 47.0, 48.3, 59.0, 59.6, 52.4, 65.2, 59.3, 51.2]

        }, {
            name: 'Berlin',
            data: [42.4, 33.2, 34.5, 39.7, 52.6, 75.5, 57.4, 60.4, 47.6, 39.1, 46.8, 51.1]

        }]
    });
</script>
</body>

</html>
