<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <link rel="stylesheet" href={{ asset('css/header.css') }} type="text/css" />
    <link rel="stylesheet" href={{ asset('css/home.css') }} type="text/css" />
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
    <script type="text/javascript" src={{ asset('js/header.js') }}></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.10.1/mdb.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</head>
@include('header')

<body>
    <div class="all" style="margin-left: 3%">
        <div class="report">
            <h3>Monthly Profit</h3>
            <a href="/report">View All</a>
            <div class="column-report">
                <div class="rect-tokped">
                    <img src={{ asset('images/icon/tokped.png') }}
                        style="background: #f8f7f2; width: 40px; height:40px; margin-left: 20px; margin-top: 20px;" />
                    <div id="chart1"></div>
                </div>
            </div>
            <div class="column-report">
                <div class="rect-shopee">
                    <img src={{ asset('images/icon/shopee.png') }}
                        style="background: #f8f7f2; width: 45px; height:45px; margin-left: 20px; margin-top: 20px;" />
                    <div id="chart2"></div>
                </div>
            </div>
        </div>

        <div class="popular-products">
            <h3>Most Popular Products</h3>
            @foreach ($data as $d)
                <div class="popular">
                    <div class="column-popular">
                        <div class="rect1">
                            <a href="{{ 'productdetail/' . $d->SKU }}">
                                <img src="{{ asset('images/best/' . $d->IMAGE) }}" alt="" width="150px" height="150px"
                                    style="border-radius: 12px">
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="all-products">
            <h3>All Products</h3>
            <a href="/product">View All</a>
            <table class="table" style="width: 52%; position: absolute; left: 23%; top: 578px;">
                <thead>
                    <tr>
                        <th scope="col" style="font-weight: 600; text-align:center;">Photo</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">SKU</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Name</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Sold</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Size</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $p)
                        <tr>
                            <th scope="row" style="text-align:center;">
                                <img src="{{ asset('images/best/' . $p->IMAGE) }}" alt="" height=100 width=100>
                            </th>
                            <td style="text-align:center;">{{ $p->SKU }}</td>
                            <td style="text-align:left;">{{ $p->PRODUCT_NAME }}</td>
                            <td style="text-align:center;">{{ $p->TOTAL_SOLD }}</td>
                            <td style="text-align:center;">{{ $p->SIZE }}</td>
                            <td style="text-align:center;">{{ $p->PRICE }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="finance">
            <h3>Finance</h3>
            <h4>&nbsp(Last 7 Days)</h4>
            <div class="netprofit" style="left: 80%; position: absolute; top: 125px;">
                <p class="finance1">
                    <span class="iconify" data-icon="dashicons:money-alt" style="color: black; "></span>
                </p>
                <h5 class="netprofit-text">Net&nbspProfit</h5>
                <h5 class="netprofit-amt">Rp{{ $income }}</h5>
            </div>
            <div class="plat-fee" style="left: 80%; position: absolute; top: 180px;">
                <p class="finance1">
                    <span class="iconify" data-icon="dashicons:money-alt" style="color: black; "></span>
                </p>
                <h5 class="fee-text">Platform&nbspFee</h5>
                <h5 class="fee-amt">Rp{{ $admin }}</h5>
            </div>
        </div>

        <div class="restock">
            <h3>Restock Soon</h3>
            <div class="restock1" style="left: 80%; position: absolute; top: 300px;">
                @foreach ($stock as $s)
                    <a href="{{ 'productdetail/' . $s->SKU }}">
                        <div class="stock-all">
                            <p class="warning1">
                                <span class="iconify" data-icon="ep:warning-filled"
                                    style="color: rgba(255, 0, 0, 0.772);"></span>
                            </p>
                            <div class="stockk">
                                <h5 class="stock-text" style="width: 200px">{{ $s->P_NAME }}</h5>
                                <h5 class="stock-qty">Stock:&nbsp{{ $s->STOCK }}</h5>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script>
        Highcharts.chart('chart1', {
            title: {
                text: " "
            },
            subtitle: {
                text: " "
            },
            yAxis: {
                title: {
                    text: " "
                },
                gridLineWidth: 0,
                gridLineColor: 'transparent',
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#f8f7f2'
                }]
            },
            xAxis: {
                categories: {!!json_encode($tanggal1)!!},
                visible: false
            },
            series: [{
                name: "Tokopedia",
                data: {!! json_encode($tokped) !!},
                color: {!! json_encode($color1) !!},
                lineWidth: 8.5,

            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            enabled: false

                        }
                    }
                }]
            }

        });
    </script>
    <script>
        Highcharts.chart('chart2', {
            title: {
                text: " "
            },

            subtitle: {
                text: " "
            },

            yAxis: {
                title: {
                    text: " "
                },
                gridLineWidth: 0,
                gridLineColor: 'transparent',
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#f8f7f2'
                }]
            },

            xAxis: {
                categories: {!!json_encode($tanggal2)!!},
                visible: false
            },
            series: [{
                name: "Shopee",
                data: {!! json_encode($shopee) !!},
                color: {!! json_encode($color2) !!},
                lineWidth: 8.5,
            }],
            responsive: {
                rules: [{
                    condition: {
                        maxWidth: 500
                    },
                    chartOptions: {
                        legend: {
                            enabled: false
                        }
                    }
                }]
            }

        });
    </script>

</body>

</html>
