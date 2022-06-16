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

    <link rel="stylesheet" href={{ asset('css/login.css') }} type="text/css" />
    {{-- <script type="text/javascript" src={{ asset('js/header.js') }}></script> --}}

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


<body style="background-color: #e5e5e5">
    @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" style="text-align: center">
            {{-- <button type="button" class="close" data-dismiss="alert">&times;</button> --}}
            {{ session()->get('error') }}
        </div>
    @endif
    <div class="rectangle">
        <div class="column">
            <div class="text-signin">
                <h3>Welcome Back!</h3>
                <p>Please enter your details</p>
            </div>
            <div class="form-signin">
                <form action="/login" method="get">
                    @csrf
                    <div class="container">
                        <div class="containercontroller">
                            <div class="admin">
                                <h2 style="font-size: small;">Admin ID :</h2>
                                <input type="text" name="admin" class="@error('admin') is-invalid @enderror" autofocus
                                    required placeholder="Admin ID" />
                                @error('admin')
                                    <div class="invalid-feedback" style="padding-bottom : 10px">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="password" style="margin-top: 10px">
                                <h2 style="font-size: small;">Password :</h2>
                                <input type="password" name="password" placeholder="********" required />
                            </div>
                        </div>
                    </div>
                    <div class="container2">
                        <div class="buttonmasuk">
                            <button type="submit">Log In</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="column">
            <div class="login">
                <img class="login" src={{ asset('images/icon/login.png') }}>
            </div>
        </div>



    </div>

</body>

</html>
