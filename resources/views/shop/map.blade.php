@extends('layouts.crop_base_phone')

@section('title')
    Crop - Mappa Negozi
@endsection

@section('content')

<div class="container-fluid map">

    <div id="mapid"></div>

    <script type="text/javascript">
        const negozi = @json($shops);
    </script>

    <script src="{{ asset('js/leaflet.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <!-- <script src="{{ asset('js/negozi.js') }}"></script> -->
    <script src="{{asset('js/cropMAP.js')}}"></script>
    <!-- <script>
        var options = {
            enableHighAccuracy: true,
            timeout: 5000,
            maximumAge: 0
        };

        var cropIcon = L.icon({
            iconUrl:'/icons/crop-logo.png',
            iconSize: [30, 30],
            popupAnchor: [0, -10],
        });

        var currentLocationIcon = L.icon({
            iconUrl:'/icons/geolocation-marker.png',
            iconSize: [30,30],
        })

        function createMap(coords){

            //set map
            var mymap = L.map('mapid', {"tap": false}).setView([coords.latitude, coords.longitude], 15);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(mymap);

            //add current location - if geoloc

            if (coords.accuracy > 0){
                L.marker([coords.latitude, coords.longitude], {icon: currentLocationIcon}).addTo(mymap);
                L.circle([coords.latitude, coords.longitude], coords.accuracy).addTo(mymap);
            }

            //add negozi
            negozi.forEach((value) => {
                var marker = L.marker([value.latitude, value.longitude], {icon: cropIcon}).addTo(mymap);
                var str = "<p><b>"+value.name+"</b><br>"+value.address+"</p><br><a href=\"./shop/show/"+value.id+"\">più informazioni</a>";
                marker.bindPopup(str);
            });
        }


        function success(pos) {
            createMap(pos.coords);
        }

        function error(err) {
            /*alert("Attiva i servizi di localizzazione")

            alert(err.code + " " + err.message)*/
            createMap({
                latitude: 45.0695947,
                longitude: 7.6870294,
                accuracy: 0,
            })
        }

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(success, error, options);
        } else {
            createMap({
                latitude: 45.0695947,
                longitude: 7.6870294,
                accuracy: 0,
            })
        }



    </script> -->

@endsection
