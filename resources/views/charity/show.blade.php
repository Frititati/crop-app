@extends('layouts.crop_base_phone')

@section('title')
    {{ $charity->name }}
@endsection

@section('content')
    <div class="container-fluid ui d-flex flex-column pt-4">

        <!-- Back Arrow -->
        <a href="{{ route('charity') }}">
            <div class="d-flex flex-row align-content-start mb-2">
                <img src="{{ asset('icons/back-arrow.svg') }}" alt="Back Arrow">
            </div>
        </a>

        <div class="d-flex flex-row justify-content-center negozio-profile-pic h-25 mb-3">
            <img src="{{ asset('images/'.($charity->photo_path ?? 'default.png')) }}" class="negozio-profile-pic h-100 rounded-circle border" alt="Logo del negozio">
        </div>

        <div class="row">
            <h6 class="mx-auto font-weight-bold">{{ $charity->name }}</h6>
        </div>

        <div class="row">
            <p class="mx-auto">{{ $charity->description ?? "-" }}</p>
        </div>

    </div>

@endsection
