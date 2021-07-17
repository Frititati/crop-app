@extends('layouts.crop_base_phone')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="container-fluid ui">
    <!-- Background -->
    <div class="svg-background">
        <svg class="ellisse top-left">
            <ellipse id="ellisse-top-left" rx="193.5" ry="184.5" cx="193.5" cy="184.5">
            </ellipse>
        </svg>
        <div class="ellisse bottom-right animated-background">
            <img src="{{ asset('icons/crop-logo.png') }}">
        </div>
    </div>

    <form id="log_out_form" method="POST" action="/logout">
        @csrf
    </form>

    <!-- UI -->
    <div class="row">
        <!-- Profile Pill-->
        <div class="row home-pill mx-3">
            <div class="col-3 image-wrapper mb-3 pr-0">
                <img src="{{ asset('images/blank-profile-picture-973460_640.png') }}" class="rounded-circle w-100 drop-shadow">
                <!-- <img src="{{ asset('icons/gear.svg') }}" class="icon-gear"> -->
            </div>
            <div class="col-9">
                <h6 class="font-weight-bold mb-1">{{ $user->name }}</h6>
                <p class="font-weight-light description-text">
                    <a href="/user_setting" class="btn btn-link text-color-crop-green btn-sm">
                        Modifica informazioni Personali
                    </a>
                    <a href="#" class="btn btn-link text-color-crop-green btn-sm" onclick="document.getElementById('log_out_form').submit();">
                        Logout
                    </a>
                    @can('is_management')
                        <a href="/management" class="btn btn-link text-color-crop-green btn-sm">
                            Management
                        </a>
                    @endcan
                </p>
            </div>
        </div>
    </div>

    <!-- COIN PILLS -->
    <div class="row coin-pill-row">
        <div class="col">
            <div class="rounded-circle coin-pill left">
                <div class="col">
                    <div class="row center-text">
                        <h5 class="mb-0 font-weight-bold">75</h5>
                        <img src="{{ asset('icons/seme 1.svg') }}" class="seme-icon-text">
                    </div>
                    <div class="row center-text">
                        <p class="mb-0">
                            min 100 da spedire
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="rounded-circle coin-pill right">
                <div class="col center-text">
                    <div class="row center-text">
                        <h5 class="mb-0 font-weight-bold">0</h5>
                        <img src="{{ asset('icons/seme 1.svg') }}" class="seme-icon-text">
                    </div>
                    <div class="row center-text">
                        <p class="mb-0">spediti</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($user->portfolio)
        <!-- CHART -->
        <div class="row justify-content-center mx-5">
            <p class="text-large mb-2 text-center">Portfolio: <b>{{ $user->portfolio->name }}</b></p>
            <canvas id="portfolio_distribution" class="doughnut-chart"></canvas>
        </div>

        <script src="{{ asset('js/chart.min.js') }}"></script>

        <script type="text/javascript">

            window.addEventListener('load', function () {
                loadPortfolioGraph();
            })


            function loadPortfolioGraph() {
                const dataPortfolio = {
                    labels: [
                        @foreach($user->portfolio->division as $division)
                            @json($division->charity->name),
                        @endforeach
                    ],
                    datasets: [{
                        label: 'PortFolio',
                        data: [
                            @foreach($user->portfolio->division as $division)
                                {{ $division->share }},
                            @endforeach
                        ],
                        backgroundColor: [
                            'rgb(70, 161, 126)',
                            'rgb(123, 173, 119)',
                            'rgb(165, 187, 111)'
                        ],
                        hoverOffset: 8
                    }]
                }

                const context = document.getElementById('portfolio_distribution').getContext('2d');

                const configDoughnut = {
                    type: 'doughnut',
                    data: dataPortfolio,
                    options: {
                        plugins: {
                            legend: {
                                display: false,
                            },
                            tooltip: {
                                bodyColor: '#fff',
                                bodyFont: {
                                    weight: 'bold',
                                },
                                bodyAlign: 'center',
                            },
                        },
                    }
                };

                const chartDoughnut = new Chart(context, configDoughnut)
            }

        </script>

    @endif

    <div class="row flex-row justify-content-end">
        <div class="option-btn rounded-circle bg-light-green p-2 mr-5">
            <a href="{{ route('portfolio_selection') }}">
                <img src="{{ asset('icons/pen.svg') }}">
            </a>
        </div>
    </div>

@endsection
