@extends('layouts.crop_base_phone')

@section('title')
    Scan QR Crop
@endsection

@section('content')

<!-- Application container -->
<div class="container-fluid list d-flex flex-column pt-4">
    <!-- Back Arrow -->
    <a href="{{ route('dashboard') }}">
        <div class="d-flex flex-row align-content-start mb-2">
            <img src="{{ asset('icons/back-arrow.svg') }}">
        </div>
    </a>

    <!-- Lista Portfolio-->

    @foreach($portfolio_list as $portfolio)
        <form method="POST" action="/portfolio/selection">
            @csrf
            <input type="hidden" name="portfolio_id" value="{{ $portfolio->id }}">
            <div class="row realta-list-element mx-1 my-2 pb-3">
                <div class="d-flex flex-row w-100 justify-content-center">
                    <h6 class="font-weight-bold">{{ $portfolio->name }}</h6>
                </div>
                <div class="row mx-1">
                    <p class="mb-2">{{ $portfolio->description }}</p>
                </div>
                <div class=" d-flex flex-row flex-wrap justify-content-center w-100 p-1 mb-3 rounded">
                    @foreach($portfolio->division as $divisor)
                        <div
                            class="d-flex flex-column rounded-circle bg-color-crop-yellow justify-content-center align-content-center center-text portfolio-pill p-2 mx-2 filter-drop-shadow">
                           <!-- <h6 class="mb-1 font-weight-bold">{{ round($divisor->share, 2)."%" }}</h6>-->
                            <p class="mb-0">{{ $divisor->charity->short_name }}</p>
                        </div>
                    @endforeach
                </div>
                @if(Auth::user()->portfolio_id != $portfolio->id)
                    <input type="submit" value="Seleziona" class="w-50 rounded bg-color-crop-green mx-auto center-text">
                @else
                    <div class="w-50 rounded bg-color-crop-yellow mx-auto center-text">Selezionato</div>
                @endif
            </div>
        </form>
    @endforeach

@endsection
