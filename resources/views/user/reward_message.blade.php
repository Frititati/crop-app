@extends('layouts.crop_base_phone')

@section('title')
    {{ $charity->name }}
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
        <div class="my-auto">

            <div id = "cloud_reward_message">
                <br>
                <br>
                <p class="px-4 h4">
                    Hai donato <strong>{{ $count_coins_to_send }}</strong> Coins
                </p>
            </div>

            <p class="mx-auto px-5 h6 text-justify">
                @lang('coin_send_messages.char_'.$charity->id.'_a')
            </p>

            <div class="d-flex flex-row justify-content-center negozio-profile-pic h-25 mb-3">
                <img src="{{ asset('images/'.($charity->photo_path ?? 'default.png')) }}" class="negozio-profile-pic h-100 rounded-circle border" alt="Logo del negozio">
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
            margin: 120px auto 20px;
        }

        #cloud_reward_message:after, #cloud_reward_message:before {
            content: '';
            position: absolute;
            background: #f2f9fe;
            z-index: -1
        }

        #cloud_reward_message:after {
            width: 90px; height: 100px;
            top: -50px; left: 50px;
            
            border-radius: 100px;
            -webkit-border-radius: 100px;
            -moz-border-radius: 100px;
        }

        #cloud_reward_message:before {
            width: 162px; height: 180px;
            top: -90px; right: 50px;
            
            border-radius: 200px;
            -webkit-border-radius: 200px;
            -moz-border-radius: 200px;
        }
    </style>

@endsection
