<!DOCTYPE html>

<html>

<head>
    <link rel="stylesheet" href={{ asset('css/report.css') }} type="text/css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

@include('header')
<body>
    <h5 class=title>Report</h5>
    <div class="dropdown-show">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" style="text-transform:unset !important;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Report
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="/report/product-sales" type="submit" value="product-sales" name="select-report">Product Sales</a>
          <a class="dropdown-item" href="/report/finance" type="submit" value="finance" name="select-report">Finance</a>
        </div>
        {{-- <form action="/report/product-sales" method="POST">
            @csrf
            <button class="paybutton" type="submit" value={{$beli_id}} name="beli_id">Pay Now</button>
        </form> --}}
    </div>
    <div class="dropdown-show2">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#" style="text-transform:unset !important; margin-left: -28px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Select Platform
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">All</a>
          <a class="dropdown-item" href="#">Tokopedia</a>
          <a class="dropdown-item" href="#">Shopee</a>
        </div>
    </div>
    <div class="dropdown-show3">
        <a class="btn btn-sm dropdown-toggle dropdown-toggle-split" href="#" style="text-transform:unset !important; margin-left: -28px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Select Period
        </a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
          <a class="dropdown-item" href="#">All</a>
          <a class="dropdown-item" href="#">Last 7 Days</a>
          <a class="dropdown-item" href="#">Last 30 Days</a>
        </div>
    </div>
    {{-- <div style="width: 80%;margin: 0 auto;">
        {!! $chart->container() !!}
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
    {!! $chart->script() !!} --}}
{{--
         <!-- Chart's container -->
         <div id="chart" style="height: 300px;"></div>
         <!-- Charting library -->
         <script src="https://unpkg.com/echarts/dist/echarts.min.js"></script>
         <!-- Chartisan -->
         <script src="https://unpkg.com/@chartisan/echarts/dist/chartisan_echarts.js"></script>
         <!-- Your application script -->
         <script>
           const chart = new Chartisan({
             el: '#chart',
             url: "{{ route('SampleChart') }}",
           });
         </script> --}}

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
    <table class="table table-hover" style="width: 70%; position: absolute; left: 320px; top: 464px;">
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
                    <th scope="row" style="text-align:center;"><img src="{{ asset('images/best/' . $d->IMAGE) }}" alt="" height=100 width=100></th>
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
</body>

</html>
