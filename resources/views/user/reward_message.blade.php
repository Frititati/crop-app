@extends('layouts.crop_base_phone')

@section('title')
    Crop - Grazie della Donazione
@endsection

@section('content')

    <!-- <meta http-equiv="refresh" content="20;URL='/dashboard'" />   -->

    <div class="container-fluid ui d-flex flex-column pt-4">

        <!-- Back Arrow -->
        <a href="{{ route('dashboard') }}">
            <div class="d-flex flex-row align-content-start mb-2">
                <img src="{{ asset('icons/back-arrow.svg') }}" alt="Back Arrow">
            </div>
        </a>

        <!-- this beauty vertically aligns all components in div -->
        <!-- <div class="my-auto"> -->

        <div id = "cloud_reward_message">
            <br>
            <br>
            <p class="px-4 h4">
                Hai donato <strong>{{ $count_coins_to_send }}</strong> Crops
            </p>
        </div>

        @foreach($user->portfolio->division as $division)
            <h4>{{ $division->charity->name }}</h4>

            <p class="mx-auto px-5 h6 text-justify">
                @lang('coin_send_messages.char_'.$division->charity->id.'_a')
            </p>
            <br>
        @endforeach

        <!-- </div> -->

        <div class="container">
            <div class="row">
                @foreach($user->portfolio->division as $division)
                    <div class="col-6">
                        <img src="{{ asset('images/'.($division->charity->photo_path ?? 'default.png')) }}" class="rounded-circle border img-fluid" alt="Logo del negozio">
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    
    <style type="text/css">

        #cloud_reward_message {
            width: 315px; height: 120px;
            
            background: #f2f9fe;
            background: linear-gradient(top, #f2f9fe 5%, #d6f0fd 100%);
            background: -webkit-linear-gradient(top, #f2f9fe 5%, #d6f0fd 100%);
            background: -moz-linear-gradient(top, #f2f9fe 5%, #d6f0fd 100%);
            background: -ms-linear-gradient(top, #f2f9fe 5%, #d6f0fd 100%);
            background: -o-linear-gradient(top, #f2f9fe 5%, #d6f0fd 100%);
            
            border-radius: 100px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
            
            position: relative;
            margin: 20px auto 20px;
        }
    </style>

@endsection
