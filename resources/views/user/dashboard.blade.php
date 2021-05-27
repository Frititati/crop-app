@extends('layouts.crop_base_phone')

@section('title')
    Crop DashBoard
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
    <div class="row">
        <!-- Profile Pill-->
        <div class="row home-pill mx-3">
            <div class="col-3 image-wrapper mb-1">
                <img src="{{ asset('images/blank-profile-picture-973460_640.png') }}" class="rounded-circle w-100 drop-shadow">
                <img src="{{ asset('icons/gear.svg') }}" class="icon-gear">
            </div>
            <div class="col-9">
                <h6 class="font-weight-bold mb-1">{{ Auth::user()->name }}</h6>
                <p class="font-weight-light description-text">Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                    Maiores eveniet doloribus dolor nihil fuga voluptate nemo atque
                </p>
            </div>
        </div>
    </div>

    <!-- COIN PILLS -->
    <div class="row coin-pill-row text-white">
        <div class="col">
            <div class="rounded-circle coin-pill left">
                <div class="col">
                    <div class="row center-text">
                        <h5 class="mb-0 font-weight-bold">{{ $coins_weekly }}</h5>
                        <img src="{{ asset('icons/seme 1.svg') }}" class="seme-icon-text">
                    </div>
                    <div class="row center-text">
                        <p class="mb-0">questa settimana</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="rounded-circle coin-pill right">
                <div class="col center-text">
                    <div class="row center-text">
                        <h5 class="mb-0 font-weight-bold">{{ $coins_total }}</h5>
                        <img src="{{ asset('icons/seme 1.svg') }}" class="seme-icon-text">
                    </div>
                    <div class="row center-text">
                        <p class="mb-0">totali</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CHART -->
    <div class="row justify-content-center mx-5">
        <canvas id="doughnut-chart" class="doughnut-chart"></canvas>
    </div>
    <div class="row flex-row justify-content-end">
        <div class="option-btn rounded-circle bg-light-green p-2 mr-5">
            <a href="./visualizza-portfolio.html">
            <img src="{{ asset('icons/pen.svg') }}">
            </a>
        </div>
    </div>

    <script src="{{ asset('js/chart.min.js') }}"></script>
    <script src="{{ asset('js/doughnut-chart.js') }}"></script>

@endsection