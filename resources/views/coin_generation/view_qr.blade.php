@extends('layouts.crop_base_phone')

@section('title')
    Visualizza QR
@endsection

@section('content')

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

    <div class="row main-conferma">
        <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $encrypted_qr_code }}&chld=M|0" class="mx-auto" alt="Generated QR Code">
    </div>

@endsection
