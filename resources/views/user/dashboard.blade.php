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

        <!-- edited to have a perfectly round logo of crop spinning -->
        <div class="crop-log-background">
            <img src="{{ asset('icons/crop-logo-circle.png') }}">
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
                        Modifica Informazioni Personali
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
            <div class="rounded-circle" id="pill-send-coins">
                <div class="col">
                    <div class="row center-text">
                        <h5 class="mb-0 font-weight-bold">{{ $count_coins_to_send }}</h5>
                        <img src="" class="seme-icon-text" id="pill-send-coin-seed-img">
                    </div>
                    <div class="row center-text">
                        <p class="mb-0" id="pill-send-coins-text">
                            min 100 da spedire
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="rounded-circle coin-pill right text-white">
                <div class="col center-text">
                    <div class="row center-text">
                        <h5 class="mb-0 font-weight-bold">{{ $count_coins_sent }}</h5>
                        <img src="{{ asset('icons/seed-white.svg') }}" class="seme-icon-text">
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

    <script type="text/javascript">
        // this JS is for the pill coin sending
        
        // this is for DOM ready
        $( document ).ready(function() {
        
        @if($count_coins_to_send >= 100)
            // this is where we can send coins

            // set text color
            $('#pill-send-coins').addClass("text-white");
            // set seed color
            $("#pill-send-coin-seed-img").attr("src","{{ asset('icons/seed-white.svg') }}");

            // set animation
            $('#pill-send-coins').css("animation", "pulse-send-coin-animation 4s ease-in-out 0s infinite");

            // change pill text
            $('#pill-send-coins-text').text("da spedire");

            @if($user->portfolio_id)
                // set on click behaviour
                $("#pill-send-coins").click(function() {
                    $('#modal-send-coins').show();
                });
            @else
                $("#pill-send-coins").click(function() {
                    $('#modal-no-portfolio').show();
                    setTimeout(function(){ closeModalGeneric() }, 8000);
                });
            @endif
            
        @else
            // this is where we can't send coins

            // set text color
            $('#pill-send-coins').addClass("text-black");
            // set seed color
            $("#pill-send-coin-seed-img").attr("src","{{ asset('icons/seed-black.svg') }}");

            // set gradient
            $('#pill-send-coins').css("background", "linear-gradient(0deg, rgba(70, 161, 126, 1) {{ $count_coins_to_send }}%, rgba(255,255,255,1) {{ $count_coins_to_send }}%)");
            $('#pill-send-coins').css("background-size", "100% 110%");
            
            // set animation
            $('#pill-send-coins').css("animation", "wave-send-coin-animation 6s ease-in-out 0s infinite");

            // change pill text
            $('#pill-send-coins-text').text("min 100 da spedire");

            // set on click behaviour
            $("#pill-send-coins").click(function() {
                $('#modal-cannot-send-coins').show();
                setTimeout(function(){ closeModalGeneric() }, 4000);
            });

        @endif

        // ends DOM ready
        });

        $('modal-cannot-send-coins').on('shown.bs.modal', function () {
          $('#myInput').trigger('focus')
        })

        function closeModalGeneric() {
            $('#modal-cannot-send-coins').hide();
            $('#modal-send-coins').hide();
            $('#modal-no-portfolio').hide();
        }

    </script>

    <div class="modal" id="modal-cannot-send-coins" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 1px solid green;">
                <div class="modal-body">
                    <h5 class="text-black">
                        Non si puo ancora spedire, servono 100 Coins
                    </h5>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalGeneric()">Chiudi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-no-portfolio" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 1px solid green;">
                <div class="modal-body">
                    <h5 class="text-black">
                        Devi scegliere un portfolio, indicaci dove spedire i coin.
                    </h5>
                    <h5 class="text-black">
                        Utilizza
                        <img src="{{ asset('icons/pen.svg') }}" class="bg-light-green">
                        per farlo
                    </h5>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeModalGeneric()">Chiudi</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="modal-send-coins" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" style="border: 1px solid green;">
                <div class="modal-body">
                    <h5 class="text-black">
                        Spedisci i coin verso le realta' del tuo portfolio!
                    </h5>
                    <form method="POST" action="/user_send_coins">
                        @csrf
                        <input type="submit" class="btn btn-primary" value="Spedisci">
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
