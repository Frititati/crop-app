<!doctype html>
<html lang="it">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <title>Login</title>

    <meta name="apple-mobile-web-app-title" content="Crop">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>

<body>

<!-- <div class="svg-background">
            <svg class="ellisse bottom" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                 width="593" height="593" viewBox="0 0 593 593">
                <circle cx="287.5" cy="287.5" r="287.5" />
            </svg>
        </div> -->



    <!-- Application container -->
    <div class="container-fluid login d-flex flex-column justify-content-center px-5">

        <div class="d-flex flex-row justify-content-center mb-3">
            <div class="img-container-logo mx-5">
                <img src="{{ asset('images/crop_logo.png') }}" alt="Crop Logo">
            </div>
        </div>

            <form method="POST" action="{{ route('login') }}" id="login_form">
                @csrf

                <div class="input-group-container mb-2">

                    <div class="d-flex flex-row input-group-login bg-color-crop-white px-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <img id="email-logo" src="{{ asset('icons/email.svg') }}" alt="Email icon">
                            </div>
                            <input type="email" class="form-control text-input-login ml-2" placeholder="Email..."
                                aria-describedby="email-logo" name="email" required>
                        </div>
                    </div>

                    <div class="d-flex flex-row input-group-login bg-color-crop-white px-4">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <img id="password-logo" src="{{ asset('icons/password.svg') }}" alt="Password logo">
                            </div>
                            <input type="password" name="password" class="form-control text-input-login ml-2" placeholder="Password..."
                                aria-describedby="password-logo" required autocomplete="current-password">
                        </div>
                    </div>

                </div>

                <div class="d-flex flex-row justify-content-end mb-3">
                    <a href="/login">
                        <p class="text-color-crop-white mb-0">Password dimenticata?</p>
                    </a>
                </div>

                <div class="d-flex flex-row justify-content-center">
                    <button type="submit" class="btn btn-yellow-crop py-2" value="Accedi">Accedi</button>
                </div>

                <input type="hidden" name="remember" value="1">
            </form>

        <!--<div class="d-flex flex-row justify-content-center footer-login">
            <h6 class="text-color-crop-yellow">Non hai un account? <b><a href="/register" class="text-color-crop-white">Registrati!</a></b></h6>
        </div>-->
    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/resize.js') }}"></script>

</body>

</html>
