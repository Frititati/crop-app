@extends('layouts.crop_base_phone')

@section('title')
    Istruzioni
@endsection

@section('content')

    <div class="container-fluid ui mb-5" id="fade-in-div">

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="font-weight-bold mb-1">
                        Ciao
                        @if (Auth::check())
                            {{ Auth::user()->name }}
                        @endif
                        <br>
                        Benvenuto in CROP!
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        In questa pagina puoi trovare tutte
                        le informazioni su come
                        funziona Crop
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        Iniziamo con le basi:
                        <br>
                        <b>A cosa servono queste icone in basso?</b>
                    </h5>
                </div>
            </div>
        </div>

        <!-- Dashboard -->

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-3">
                    <a href="{{ route('dashboard') }}">
                        <div class="rounded-circle">
                            <img src="{{ asset('icons/crop-logo.png') }}" class="icon-help ">
                        </div>
                    </a>
                </div>
                <div class="col-9">
                    <h4>
                        <strong>Il logo Crop</strong>
                    </h4>
                </div>
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        ti porta alla <strong>dashboard</strong>, in cui puoi:
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        vedere quanti Crops hai
                        accumulato,
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        vedere e scegliere a quali realtà sostenibili vengono donati i tuoi crops,
                    </h5>
                </div>
            <!--
                <div class="col-3">
                    <div class="option-btn rounded-circle bg-light-green p-2">
                        <a href="{{ route('portfolio_selection') }}">
                            <img src="{{ asset('icons/pen.svg') }}">
                        </a>
                    </div>
                </div>
                -->
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        modificare i tuoi dati personali
                    </h5>
                </div>
            </div>
        </div>

        <!-- Qr Scan -->

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-9">
                    <h4 class="mb-1">
                        <strong>QR</strong>
                    </h4>
                </div>
                <div class="col-3 pl-0">
                    <a href="{{ route('qr_scan') }}">
                        <div class="rounded-circle">
                            <img src="{{ asset('icons/QR.svg') }}" class="icon-help">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        ti porta alla pagina in cui puoi reclamare i Crops nei negozi convenzionati
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        per farlo, ti basterà chiedere e scannerizzare il <strong> QR Crop </strong> alla cassa
                    </h5>
                </div>
            </div>
        </div>
        <!-- Shop Map -->

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-3">
                    <a href="{{ route('shop_map') }}">
                        <div class="rounded-circle">
                            <img src="{{ asset('icons/world.svg') }}" class="icon-help ">
                        </div>
                    </a>
                </div>
                <div class="col-9">
                    <h4 class="mb-1">
                        <strong>Mappa</strong>
                    </h4>
                </div>
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        ti mostra la mappa in cui potrai vedere tutti i <strong>negozi aderenti</strong> a Crop
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        cliccando sull'icona del negozio, puoi ottenere più informazioni a riguardo
                    </h5>
                </div>
            </div>
        </div>

        <!-- Charity -->

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">

                <div class="col-9">
                    <h4 class="mb-1">
                        <strong>Cerca</strong>
                    </h4>
                </div>
                <div class="col-3 pl-0">
                    <a href="{{ route('charity') }}">
                        <div class="rounded-circle">
                            <img src="{{ asset('icons/search.svg') }}" class="icon-help">
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        ti permette di vedere le varie <strong>realtà sostenibili</strong> presenti sulla piattaforma, divise per categoria
                    </h5>
                </div>
            </div>
        </div>

        <!-- User help -->

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-3">
                    <a href="{{ route('user_help') }}">
                        <div class="rounded-circle">
                            <img src="{{ asset('icons/question-mark.svg') }}" class="icon-help ">
                        </div>
                    </a>
                </div>
                <div class="col-9">
                    <h4 class="mb-1">
                        <strong>Aiuto</strong>
                    </h4>
                </div>
            </div>
        </div>

        <div class="row help-right-chat fade-in-chat">
            <div class="row help-right-pill crop-green">
                <div class="col-12">
                    <h5 class="mb-1">
                        ti ripropone questo breve tutorial
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        Ti ringraziamo per aver deciso di partecipare a questa beta privata!
                    </h5>
                </div>
            </div>
        </div>
        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill crop-yellow">
                <div class="col-12">
                    <h5 class="mb-1">
                        Nel caso in cui tu abbia domande o voglia segnalarci un bug, non esitare a scriverci a <a href="mailto:torinocrop@gmail.com"><strong>torinocrop@gmail.com</strong></a>
                    </h5>
                </div>
            </div>
        </div>

        <div class="row help-left-chat fade-in-chat">
            <div class="row help-left-pill">
                <div class="col-12">
                    <h5 class="mb-1">
                        <br>
                        <br>.
                    </h5>
                </div>
            </div>
        </div>
    </div>

        <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('.fade-in-chat').each(function(fadeInDiv){
                    $(this).delay(fadeInDiv * 300).fadeIn(300);
                    $(this).css("z-index", "100");
                });
            });
        </script>


@endsection
