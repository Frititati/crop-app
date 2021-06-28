@extends('layouts.crop_base_phone')

@section('title')
    Scan QR Crop
@endsection

@section('content')

<div class="container-fluid ui d-flex flex-column justify-content-center align-content-center">
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
            <div id="outputMessage">Per scannerizzare il QR, è necessario concedere l'accesso alla fotocamera</div>
        </div>
    </div>


    <form id="scanning_form" action="/coin/link" method="POST">
        @csrf
        <input type="hidden" name="qr_code" id="form_qr_code">
    </form>
    <script src="{{ asset('js/jsQR.js') }}"></script>
    <script src="{{ asset('js/cropQR.js') }}"></script>

@endsection
