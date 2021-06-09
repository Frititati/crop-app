@extends('layouts.crop_base_phone')

@section('title')
    Ricevuti Crops
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
            <h3 class="text-color-crop-yellow"><b>COMPLIMENTI</b></h3>
            <h6>Hai ricevuto <b>{{ $generation->amount }} Cropcoin</b>!</h6>
            <div class="row row-semi-sm mb-1">
                @for($i = 0; $i < $generation->amount; $i++ )
                    <div class="col seme-sm">
                        <img src="{{ asset('/icons/seme 2.svg') }}" class="seme-sm">
                    </div>
                @endfor
            </div>
            <p class="transaction-description">Azienda: <b id="nome_azienda">{{ $generation->shop->name }}</b></p>
            <p class="transaction-description">Negozio: <b id="nome_negozio">{{ $generation->shop->address }}</b></p>
            <!-- <p class="transaction-description">Data: <b id="data_transazione">{{ $generation->shop->ts }}</b></p> -->
        </div>
    </div>

@endsection