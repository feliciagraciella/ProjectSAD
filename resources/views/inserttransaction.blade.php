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
    @if (session("success"))
        <div class="alert alert-success alert-dismissible fade show" style="z-index: 999; margin-left: 250px; margin-top: 55px; position: absolute; width: -webkit-fill-available;" role="alert">
            {{ session("success")}}
            <button type="button" class="btn-close" style="padding:17px" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session("error"))
        <div class="alert alert-danger alert-dismissible fade show" style="z-index: 999; margin-left: 250px; margin-top: 55px; position: absolute; width: -webkit-fill-available;" role="alert">
            {{ session("error")}}
            <button type="button" class="btn-close" style="padding:17px" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <h5 class=title>Insert Transaction</h5>


    <form method="POST" action="/inserttrans">
        @csrf
            <div class="baris1" style="z-index: 1000">
                <h4 class="datetitle">Date</h4>
                <input class="btn btn-sm calendar {{$disable}}" value="{{$date}}" id="dateee" name="date" style="text-transform:unset !important; width: 250px;" type="date">

                <script>
                    dateee.max = new Date().toISOString().split("T")[0];
                </script>

                <h4 class="platformtitle" >Platform</h4>
                <div class="dropdown-show2" >
                    <select {{$disable}} class="dropdowncat" id="cat" name="selectplatform"
                        style="text-transform:unset !important; width: 250px; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <option value="{{$platform}}" disabled selected hidden>{{$platform}}</option>
                        <option value="Tokopedia">Tokopedia</option>
                        <option value="Shopee">Shopee</option>
                    </select>
                </div>
            </div>

            <div class="baris2">
                <h4 class="datetitle">Product</h4>
                <div class="dropdown-show3">
                    <select class="dropdowncat" id="cat" name="product"
                        style="text-transform:unset !important; width: 250px; height:30.97px; text-align: center; border:none; box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; border-radius: 5px;"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <option value="" disabled selected hidden>Select Product</option>

                        @foreach($product as $p)
                        <option value="{{$p -> SKU}}">{{$p -> NAME}}</option>
                        @endforeach

                    </select>
                </div>

                <h4 class="platformtitle">Quantity</h4>
                <div class="numericupdown">
                    <input class="form-control btn btn-sm d-inline text-center me-3 txtJumlah" name="inputQuantity" min=1 value="1" type="number" style="width: 250px;">
                </div>
            </div>

            <div class="baris3">
                {{-- @if (session("success"))
                    <div class="alert alert-success alert-dismissible fade show" style="z-index: 1001; width: 75%; transform: translateY(-50%);" role="alert">
                        {{ session("success")}}
                        <button type="button" class="btn-close" style="padding:17px" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif --}}

                <div class="buttonadd">
                    <button onclick="return confirm('Are you sure?')" type="submit" name="buttonadd" class="btn btn-secondary btn-sm" style="text-transform: unset !important; width: 150px;">Add</button>
                </div>

            </div>


    </form>

    <form method="POST" action="/deletecart">
        @csrf
            <div class="table">
                <table class="table" style="width: 70%; transform:translateY(380px); margin-left: 320px; overflow-y:scroll;">
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
                        @foreach ($cart as $c)
                            <tr>
                                <td style="font-weight: 600; text-align:left;">{{$c -> ID_TRANSACTION}}</td>
                                <td style="font-weight: 600; text-align:left;">{{$c -> DATE}}</td>
                                <td style="font-weight: 600; text-align:left;">{{$c -> PLATFORM}}</td>
                                <td style="font-weight: 600; text-align:left;">{{$c -> NAME}}</td>
                                <td style="font-weight: 600; text-align:left;">{{$c -> QTY_PRODUCT}}</td>
                                <td style="font-weight: 600; text-align:left; width: 10%;"><button name="deletecart" value="{{ $c->SKU }}" type="submit" style="text-align:center; margin-right:30px;" class="close">&#10005;</button></td>
                                {{-- <td style="font-weight: 600; text-align:left; width: 10%;"><span onclick="myform.submit()" style="text-align:center; margin-right:30px;" class="close">&#10005;</span></td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
    </form>

    <form method="POST" action="/insertt">
        @csrf
            <div class="totaltransaction">
                <h4 class="totalfee" style="width: 150px;">Total Transaction</h4>
                <div class="inputtotaltrans">
                    <input oninput="myFunction()" id="inputtrans" type="text" name="p" class="form-control btn btn-sm" style="text-transform:unset !important; width: 200px; text-align: right;" placeholder="Enter value">
                </div>
            </div>

            <div class="totalplatfee">
                <h4 class="totalfee" style="width: 150px;">Total Platform Fee</h4>
                <div class="inputtotalfee">
                    <input oninput="myFunction()" id="inputfee" type="text" name="insertfee" class="form-control btn btn-sm" style="text-transform:unset !important; width: 200px; text-align: right;" placeholder="Enter value">
                </div>
            </div>

            <hr class="hrhasil">

            <div class="totalakhir">
                <h4 class="totalfee" style="width: 150px;">Total</h4>
                <h4 id="total" class="totalakhirr" style="width: 150px;">Rp. 0</h4>
            </div>

            <script type="text/javascript" src="js/inserttrans.js"></script>

            <div class="buttonbutton">
                <div class="buttoninsert">
                    <button onclick="return confirm('Are you sure?')" type="submit" name="insertprice" class="btn btn-secondary btn-sm" style="text-transform: unset !important; width: 120px; ">Insert</button>
                </div>
    </form>
                <div class="buttondelete">
                    <form method="POST"  action="/deleteall">
                    {{-- <form method="POST" action="/deleteall"> --}}
                        @csrf
                        <button onclick="return confirm('Are you sure?')" type="submit" name="insertfee" class="btn btn-outline-secondary btn-sm" style="text-transform: unset !important; width: 120px; ">Delete All</button>
                    </form>
                </div>

            </div>

</body>

</html>
