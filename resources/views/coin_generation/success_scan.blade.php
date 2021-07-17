@extends('layouts.crop_base_phone')

@section('title')
    Ricevuti {{ $generation->amount }} Crops
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
        <div class="col text-center mx-auto">
            <h3 class="text-color-crop-yellow"><b>COMPLIMENTI</b></h3>
            <h6>Hai ricevuto <b>{{ $generation->amount }} Crops</b>!</h6>
            <div class="row row-semi-sm mb-2 mx-5">
                @for($i = 0; $i < 12; $i++)
                    <div class="col seme-sm">
                        <img src="{{ asset('/icons/seme 2.svg') }}" class="seme-sm" alt="Icona Seme Crop">
                    </div>
                @endfor
            </div>
            <p class="transaction-description mb-2">Azienda: <b id="nome_azienda">{{ $generation->shop->name }}</b></p>
            <p class="transaction-description mb-2">Negozio: <b id="nome_negozio">{{ $generation->shop->address }}</b></p>
            <br>
            <div class="row receive_crop_pill mx-3">
                <h5>
                    Grazie! Con questo acquisto hai contribuito a salvaguardare la salute dei cani e dei gatti piemontesi.
                </h5>
            </div>
            <!-- <p class="transaction-description">Data: <b id="data_transazione">{{ $generation->shop->ts }}</b></p> -->
        </div>
    </div>

@endsection
