<!doctype html>
<html lang="it">

<head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <!-- CROP style sheet -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>Registrati</title>

        <!-- APPLE WEB APP -->
        <meta name="apple-mobile-web-app-title" content="Crop">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
        <link rel="apple-touch-icon" href="{{ asset('icons/crop-logo-white-bg.png') }}">

        <!-- moved scripts to head content -->
        <!-- jQuery JS first -->
        <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js" integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
        <!-- the Poppers JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <!-- then Bootstrap JS -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <!-- the resize JS -->
        <script src="{{ asset('js/resize.js') }}"></script>

        <!-- ANDROID WEB APP
        <link rel="manifest" href="{{ asset('js/manifest.json') }}" crossorigin="use-credentials"> -->

</head>

<body>

        @if($errors->any())
            <div id="generic_error" class="notification is-error" style="z-index: 100;">
                {{$errors->first()}}
            </div>

            <script type="text/javascript">
                setTimeout(genericClearMessage, 20000);
                function genericClearMessage() {
                    document.getElementById('generic_error').style.display = "none";
                }
            </script>
        @endif

        <!-- don't know if this is actually necessary -->
        @if(session()->has('error'))
            <!-- <div id="generic_error" class="notification is-error">
                {{session()->get('error')}}
            </div>

            <script type="text/javascript">
                setTimeout(genericClearMessage, 20000);
                function genericClearMessage() {
                    document.getElementById('generic_error').style.display = "none";
                }
            </script> -->
        @endif

        @if(session()->has('message'))
            <div id="return_message" class="notification is-success" style="z-index: 100;">
                {{ session()->get('message') }}
            </div>
            <script type="text/javascript">
                setTimeout(clearMessage, 20000);
                function clearMessage() {
                    document.getElementById('return_message').style.display = "none";
                }
            </script>
            @php
                session()->forget('message');
            @endphp
        @endif

    <!-- Application container -->
    <div class="container-fluid login d-flex flex-column justify-content-center px-5">

        <div class="d-flex flex-row justify-content-center mb-3">
            <div class="img-container-logo mx-5">
                <img src="{{ asset('images/crop_logo.png') }}" alt="Crop Logo">
            </div>
        </div>

        <div class="d-flex flex-row justify-content-center mb-3">
            <p class="text-color-crop-white mb-0" style="font-size: 1rem;">
                Compila i campi per Registrarti!
            </p>
        </div>

        <form method="POST" action="{{ route('register') }}" id="login_form">
            @csrf

            <div class="input-group-container mb-2">

                <div class="d-flex flex-row input-group-register bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="text" class="form-control text-input-register ml-2" placeholder="Nome..." value="{{ old('name') ?? ''}}" aria-describedby="name" name="name" required autocomplete="off" />
                    </div>
                </div>

                <div class="d-flex flex-row input-group-register bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="text" class="form-control text-input-register ml-2" placeholder="Cognome..." value="{{ old('surname') ?? ''}}" aria-describedby="surname" name="surname" required autocomplete="off" />
                    </div>
                </div>

            </div>

            <div class="input-group-container mb-2">

                <div class="d-flex flex-row input-group-register bg-color-crop-white px-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <img id="email-logo" src="{{ asset('icons/email.svg') }}" alt="Email icon">
                        </div>
                        <input type="email" class="form-control text-input-register ml-2" placeholder="Email..." value="{{ old('email') ?? ''}}" aria-describedby="email-logo" name="email" required autocomplete="off" />
                    </div>
                </div>

                <div class="d-flex flex-row input-group-register bg-color-crop-white px-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <img id="email-logo" src="{{ asset('icons/email.svg') }}" alt="Email icon">
                        </div>
                        <input type="email" class="form-control text-input-register ml-2" placeholder="Conferma Email..." value="{{ old('email_confirmation') ?? ''}}" aria-describedby="email-logo" name="email_confirmation" required autocomplete="off" />
                    </div>
                </div>

            </div>

            <div class="input-group-container mb-2">

                <div class="d-flex flex-row input-group-register bg-color-crop-white px-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <img id="password-logo" src="{{ asset('icons/password.svg') }}" alt="Password logo">
                        </div>
                        <input type="password" name="password" class="form-control text-input-register ml-2" placeholder="Password..." aria-describedby="password-logo" required autocomplete="off" />
                    </div>
                </div>

                <div class="d-flex flex-row input-group-register bg-color-crop-white px-4">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <img id="password-logo" src="{{ asset('icons/password.svg') }}" alt="Password logo">
                        </div>
                        <input type="password" name="password_confirmation" class="form-control text-input-register ml-2" placeholder="Conferma Password..." aria-describedby="password-logo" required autocomplete="off" />
                    </div>
                </div>

            </div>

            <div class="d-flex flex-row justify-content-center">
                <div class="form-check">
                    <input type="checkbox" id="privacy_check_checkbox" name="privacy_check" class="form-check-input" required/>
                    <label for="privacy_check_checkbox" class="form-check-label text-color-crop-white">
                        Hai letto la 
                        <a href="/privacy_policy">
                            Privacy Policy?
                        </a>
                    </label>
                </div>
            </div>

            <div class="d-flex flex-row justify-content-center">
                <button type="submit" class="btn btn-yellow-crop py-2" value="Registrati">Registrati</button>
            </div>

            <input type="hidden" name="remember" value="1">
        </form>

    </div>

</body>

</html>
