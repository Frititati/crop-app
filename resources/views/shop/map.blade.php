@extends('layouts.crop_base_phone')

@section('title')
    Map
@endsection

@section('content')

<div class="container-fluid map">

    <div id="mapid"></div>

    <script type="text/javascript">
        const negozi = @json($shops);
    </script>

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <!-- <script src="{{ asset('js/negozi.js') }}"></script> -->
    <script src="{{ asset('js/cropMAP.js') }}"></script>

@endsection