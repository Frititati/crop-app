@extends('layouts.crop_base_phone')

@section('title')
    {{ $shop->name }}
@endsection

@section('content')
<div class="container-fluid ui d-flex flex-column pt-4">
<!-- Back Arrow -->
    <a href="{{ route('shop_map') }}">
        <div class="d-flex flex-row align-content-start mb-2">
            <img src="{{ asset('icons/back-arrow.svg') }}">
        </div>
    </a>
    <div class="d-flex flex-row justify-content-center negozio-profile-pic h-25 mb-3">
        <img src="{{ asset('images/'.$shop->photo_path) }}" class="negozio-profile-pic h-100 rounded-circle border">
    </div>
    <div class="row">
        <h6 class="mx-auto font-weight-bold">{{ $shop->name }}</h6>
    </div>
    <div class="row">
        <p class="mx-auto">dona 10 Crops per ogni acquisto</p>
    </div>
    <!-- Links Row-->
    <div class="d-flex flex-row justify-content-between mx-4">
        <!-- Phone -->
        <a class="negozio-links" href="tel:{{$shop -> phone_number}}">
            <div class="d-flex flex-column align-content-center">
                <div class="circle-button rounded-circle filter-drop-shadow text-center mb-2"><img
                    class="h-100 mx-auto" src="{{ asset('icons/phone.svg') }}"></div>
                <div class="text-center">
                    <p>Chiama</p>
                </div>
            </div>
        </a>
        <!-- Directions -->
        <a class="negozio-links" href="https://www.google.com/maps/dir/?api=1&destination={{$shop -> address}}">
            <div class="d-flex flex-column align-content-center">
                <div class="circle-button rounded-circle filter-drop-shadow text-center mb-2"><img
                    class="h-100 mx-auto" src="{{ asset('icons/directions.svg') }}"></div>
                <div class="text-center">
                    <p>Indicazioni</p>
                </div>
            </div>
        </a>
        <!-- Website -->
        <a class="negozio-links" href="{{ $shop->website_url }}">
            <div class="d-flex flex-column align-content-center">
                <div class="circle-button rounded-circle filter-drop-shadow text-center mb-2"><img
                    class="h-100 mx-auto" src="{{ asset('icons/website.svg') }}"></div>
                <div class="text-center">
                    <p>Sito Web</p>
                </div>
            </div>
        </a>
        <!-- Social -->
        <a class="negozio-links" href="{{ $shop->social_link }}">
            <div class="d-flex flex-column align-content-center">
                <div class="circle-button rounded-circle filter-drop-shadow text-center mb-2"><img
                    class="h-100 mx-auto" src="{{ asset('icons/facebook.svg') }}"></div>
                <div class="text-center">
                    <p>Facebook</p>
                </div>
            </div>
        </a>
    </div>

    <div class="rounded border" id="map-negozio">
    </div>

    <script src="{{ asset('js/leaflet.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">

    <script>
        window.onload = function(){
            var cropIcon = L.icon({
                iconUrl: '/icons/crop-logo.png',
                iconSize: [30, 30],
                popupAnchor: [0, -10],
            });

            var infoNegozio = {
                latitude: {{ $shop->latitude }},
                longitude: {{ $shop->longitude }},
                name: "{{ $shop->name }}",
                address: "{{ $shop->address }}"
            };

            var mymap = L.map('map-negozio', { zoomControl: false }).setView([infoNegozio.latitude, infoNegozio.longitude], 17);
            mymap.touchZoom.disable();


            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            var marker = L.marker([infoNegozio.latitude, infoNegozio.longitude], { icon: cropIcon }).addTo(mymap);
            var str = "<p><b>" + infoNegozio.name + "</b><br>" + infoNegozio.address + "</p>";

            marker.bindPopup(str).openPopup();
        };
    </script>

</div>

@endsection
