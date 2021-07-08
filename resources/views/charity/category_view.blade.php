@extends('layouts.crop_base_phone')

@section('title')
       Realtà Sostenibili
@endsection

@section('content')

<div class="container-fluid ui d-flex flex-column pt-4">

    <!-- Back Arrow -->
    <a href="{{ route('charity') }}">
        <div class="d-flex flex-row align-content-start mb-2">
            <img src="{{ asset('icons/back-arrow.svg') }}">
        </div>
    </a>

    <!-- Lista realtà-->
    <!-- element -->
        @forelse($charities as $charity)
            <div class="row realta-list-element mx-1 my-2">
                <div class="d-flex flex-column col-4 justify-content-center px-1">
                    <div><img src="{{ asset('images/'.($charity->photo_path ?? "")) }}" class="w-100"></div>
                </div>
                <div class="d-flex flex-column col-8 pr-0">
                    <h6><b>{{ $charity->name }}</b></h6>
                    <p class="justify-text">
                        {{ $charity->description }}
                    </p>
                </div>
            </div>
        @empty
            <div class="row realta-list-element mx-1 my-2">
                <div class="d-flex flex-column col-12 pr-0">
                    <p>
                        Al momento non sono presenti realtà sostenibili in questa categoria.
                    </p>
                </div>
            </div>
        @endforelse


@endsection
