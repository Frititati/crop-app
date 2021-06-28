<!doctype html>
<html lang="it">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">
        <!-- Bootstrap CSS -->

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">

        <title>@yield('title')</title>

        <meta name="apple-mobile-web-app-title" content="Crop">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
    </head>
    <body>

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

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

        <script src="{{ asset('js/resize.js') }}"></script>

    </body>
</html>
