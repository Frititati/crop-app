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
    <title>Crop QR Reader</title>
    <meta name="apple-mobile-web-app-title" content="Crop">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>
<body>
    <!-- Application container -->
    <div class="container-fluid ui">
        <!-- Background -->
        <div class=" svg-background">
            <svg class="ellisse top-left">
                <ellipse id="ellisse-top-left" rx="193.5" ry="184.5" cx="193.5" cy="184.5">
                </ellipse>
            </svg>
            <svg class="ellisse bottom-right">
                <ellipse id="ellisse-bottom-right" rx="193.5" ry="184.5" cx="193.5" cy="184.5">
                </ellipse>
            </svg>
        </div>
        <!-- QR Reader -->
        <div class="qr-reader-container">
            <div id="loadingMessage" hidden="false">⌛ Loading video...</div>
            <canvas id="canvas" height="300" width="300" class="rounded-circle"></canvas>
            <div id="output">
                <div id="outputMessage">No QR code detected.</div>
                <div hidden="true"><b>Data:</b> <span id="outputData"></span></div>
            </div>
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
    <form id="scanning_form" action="/coin/generation" method="POST">
        @csrf
        <input type="hidden" name="qr_code" id="form_qr_code">
    </form>
    <script src="{{ asset('js/jsQR.js') }}"></script>
    <script src="{{ asset('js/cropQR.js') }}"></script>
</body>
</html>