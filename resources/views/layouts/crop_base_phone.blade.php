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

        <title>Crop - @yield('title')</title>

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

        <!-- starting div is inside the content folder -->
            @yield('content')

            <br>
            <br>
            <br>
            <br>
            <br>

            <!-- FOOTER -->
            <div class="footer">
                <a href="{{ route('qr_scan') }}">
                    <div class="footer-link left-icon"><img src="{{ asset('icons/QR.svg') }}" class="icon-footer"></div>
                </a>
                <a href="{{ route('shop_map') }}">
                    <div class="footer-link left-icon"><img src="{{ asset('icons/world.svg') }}" class="icon-footer"></div>
                </a>
                <a href="{{ route('dashboard') }}">
                    <div class="footer-link logo-crop rounded-circle"><img src="{{ asset('icons/crop-logo.png') }}" class="icon-footer center-icon"></div>
                </a>
                <a href="{{ route('charity') }}">
                    <div class="footer-link right-icon">
                        <img src="{{ asset('icons/search.svg') }}" class="icon-footer right-icon">
                    </div>
                </a>
                <a href="{{ route('user_help') }}">
                    <div class="footer-link right-icon">
                        <img src="{{ asset('icons/question-mark.svg') }}" class="icon-footer right-icon">
                    </div>
                </a>
            </div>
        </div>



    </body>
</html>
