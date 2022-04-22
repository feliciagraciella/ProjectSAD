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
    <div class="rectangle">
        <div class="text-signin">
            <h3>Welcome Back!</h3>
            <p>Please enter yout details</p>
        </div>
        <div class="form-signin">
            <form action="/home" method="post">
                @csrf
                <div class="container">
                    <div class="containercontroller">
                        <div class="email">
                            <h2 style="font-size: small;">E-mail :</h2>
                            <input type="admin" name="admin" class="@error('email') is-invalid @enderror" autofocus
                                required value="{{ old('email') }}" placeholder="Admin ID" />
                            @error('email')
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
                        <button>Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
