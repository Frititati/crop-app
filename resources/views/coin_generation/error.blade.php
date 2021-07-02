@extends('layouts.crop_base_phone')

@section('title')
    Errore QR
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
    <!-- UI -->

    <div class="row main-conferma">
        <div class="col text-center">
            <h6>{{ $message }}</h6>
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

@endsection
