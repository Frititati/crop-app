@extends('layouts.crop_base_phone')

@section('title')
        Menù Realtà Sostenibili
@endsection

@section('content')

<div class="container-fluid ui d-flex flex-column justify-content-center align-content-center">

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

    <!-- Circles -->
    <div class="row d-flex justify-content-center">
        <div
            class="circle-category rounded-circle sin cos d-flex flex-column justify-content-around align-content-center text-center"
            style="--angle:-1.5708">
            <a href="/charity/green_spaces">
                <img src="{{ asset('icons/spazi-verdi.svg') }}">
                <h6>Spazi Verdi</h6>
            </a>
        </div>
        <div
            class="circle-category rounded-circle sin cos d-flex flex-column justify-content-around align-content-center text-center"
            style="--angle:-0.314159">
            <a href="/charity/animals">
                <img src="{{ asset('icons/animali.svg') }}">
                <h6>Animali</h6>
            </a>
        </div>
        <div
            class="circle-category rounded-circle sin cos d-flex flex-column justify-content-around align-content-center text-center"
            style="--angle:0.942478">
            <a href="/charity/society">
                <img src="{{ asset('icons/societa.svg') }}" class="pb-2">
                <h6>Società</h6>
            </a>
        </div>
        <div
            class="circle-category rounded-circle sin cos d-flex flex-column justify-content-around align-content-center text-center"
            style="--angle:2.19911">
            <a href="/charity/food">
                <img src="{{ asset('icons/cibo.svg') }}">
                <h6>Cibo</h6>
            </a>
        </div>
        <div
            class="circle-category rounded-circle sin cos d-flex flex-column justify-content-around align-content-center text-center"
            style="--angle:-2.82743">
            <a href="/charity/water">
                <img src="{{ asset('icons/acqua.svg') }}">
                <h6>Acqua</h6>
            </a>
        </div>
    </div>

@endsection
