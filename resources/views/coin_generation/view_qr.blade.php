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
    <title>Gem QR</title>

    <meta name="apple-mobile-web-app-title" content="Crop">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>

<body>
    <!-- Application container -->
    <div class="container-fluid ui">
        <!-- Background -->
        <div class="svg-background">
            <svg class="ellisse top-left">
                <ellipse id="ellisse-top-left" rx="193.5" ry="184.5" cx="193.5" cy="184.5">
                </ellipse>
            </svg>
            <svg class="ellisse bottom-right">
                <ellipse id="ellisse-bottom-right" rx="193.5" ry="184.5" cx="193.5" cy="184.5">
                </ellipse>
            </svg>
        </div>
        <!-- UI -->

        <div class="row main-conferma">
            <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $encrypted_qr_code }}&chld=M|0">
        </div>

        <!-- FOOTER -->
        <div class="footer">
            <div class="footer-link left-icon">
                <img src="{{ asset('icons/play.svg') }}" class="icon-footer">
            </div>
            <div class="footer-link left-icon">
                <img src="{{ asset('icons/world.svg') }}" class="icon-footer">
            </div>
            <a href="./home.html">
                <div class="footer-link logo-crop rounded-circle">
                    <img src="{{ asset('icons/crop-logo.png') }}" class="icon-footer center-icon">
                </div>
            </a>
            <a href="./menu-realta.html">
                <div class="footer-link right-icon">
                    <img src="{{ asset('icons/search.svg') }}" class="icon-footer right-icon">
                </div>
            </a>
            <div class="footer-link right-icon">
                <img src="{{ asset('icons/seme 1.svg') }}" class="icon-footer right-icon">
            </div>
        </div>
    </div>
</body>
</html>