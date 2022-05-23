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
            <h3>Monthly Report</h3>
            <a href="/report">View All</a>
            <div class="column-report">
                <div class="rect-tokped">

                </div>
            </div>
            <div class="column-report">
                <div class="rect-shopee">

                </div>
            </div>
        </div>

        <div class="popular-products">
            <h3>Most Popular Products</h3>
            <div class="column-popular">
                <div class="rect1">
                    {{-- <img src="{{ asset('images/best/' . $data->IMAGE) }}" alt="" height=100 width=100> --}}
                </div>
            </div>
            <div class="column-popular">
                <div class="rect2">

                </div>
            </div>
            <div class="column-popular">
                <div class="rect3">

                </div>
            </div>
            <div class="column-popular">
                <div class="rect4">

                </div>
            </div>

        </div>

        <div class="all-products">
            <h3>All Products</h3>
            <a href="/product">View All</a>
            <table class="table table-hover" style="width: 52%; position: absolute; left: 23%; top: 578px;">
                <thead>
                    <tr>
                        <th scope="col" style="font-weight: 600; text-align:center;">Photo</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">SKU</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Name</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Total Sales</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Size</th>
                        <th scope="col" style="font-weight: 600; text-align:center;">Price</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $p)
                        <tr>
                            <th scope="row" style="text-align:center;">
                                <img src="{{ asset('images/best/' . $p->IMAGE) }}" alt="" height=100 width=100>
                                {{-- <img src="{{ asset('images/best/{{ $p->IMAGE }}') }}"alt="" height=50 width=50> --}}
                            </th>
                            <td style="text-align:center;">{{ $p->SKU }}</td>
                            <td style="text-align:left;">{{ $p->P_NAME }}</td>
                            {{-- <td style="text-align:center;">{{ $p->sum(DETAIL_TRANSACTION . QTY_PRODUCT) }}</td> --}}
                            <td style="text-align:center;">5</td>
                            <td style="text-align:center;">{{ $p->SIZE }}</td>
                            <td style="text-align:center;">{{ $p->PRICE }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>


        <div class="finance">
            <h3>Finance</h3>
            <div class="netprofit" style="left: 80%; position: absolute; top: 125px;">
                <p class="finance1">
                    <span class="iconify" data-icon="dashicons:money-alt" style="color: black; "></span>
                </p>
                <h5 class="netprofit-text">Net&nbspProfit</h5>
                <h5 class="netprofit-amt">Rp7.500.000</h5>
            </div>
            <div class="plat-fee" style="left: 80%; position: absolute; top: 180px;">
                <p class="finance1">
                    <span class="iconify" data-icon="dashicons:money-alt" style="color: black; "></span>
                </p>
                <h5 class="fee-text">Platform&nbspFee</h5>
                <h5 class="fee-amt">Rp1.500.000</h5>
            </div>
        </div>

        <div class="restock">
            <h3>Restock Soon</h3>
            <div class="restock1" style="left: 80%; position: absolute; top: 300px;">
                <p class="warning1">
                    <span class="iconify" data-icon="ep:warning-filled" style="color: black;"></span>
                </p>
                <h5 class="stock-text">Product&nbspName</h5>
                <h5 class="stock-qty">Stock:&nbsp3</h5>
            </div>


        </div>

    </div>






</body>

</html>
