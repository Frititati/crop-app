@extends('layouts.crop_base_phone')

@section('title')
    Crop DashBoard
@endsection

@section('content')

<div class="container-fluid ui" id="fade-in-div">
    <!-- Background -->
    <div class="svg-background">
        <svg class="help-square-top-left">
            <!-- <rect x="-20" y="-20" rx="15" ry="15" width="150" height="40">
            </rect> -->
            <rect x="-20" y="-20" rx="15" ry="15" width="40" height="290">
            </rect>
        </svg>
        <svg class="ellisse bottom-right">
            <ellipse rx="193.5" ry="184.5" cx="193.5" cy="184.5">
            </ellipse>
        </svg>
    </div>


    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="font-weight-bold mb-1">
                    Ciao
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
                    Qua puoi trovare tutte
                    <br>
                    le informazione su come
                    <br>
                    Crop funziona
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="mb-1">
                    Iniziamo con le basi
                    <br>
                    Cosa sono tutte queste icone!
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-3">
                <a href="{{ route('dashboard') }}">
                    <div class="rounded-circle">
                        <img src="{{ asset('icons/crop-logo.png') }}" class="icon-help center-icon">
                    </div>
                </a>
            </div>
            <div class="col-9">
                <h5>
                    <strong>La Dashboard</strong>
                    <br>
                    dove trovi il
                    <br>
                    tuo account
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-2">
                <a href="{{ route('qr_scan') }}">
                    <div class="rounded-circle">
                        <img src="{{ asset('icons/QR.svg') }}" class="icon-help-small center-icon">
                    </div>
                </a>
            </div>
            <div class="col-10">
                <h5 class="mb-1">
                    <strong>QR</strong>
                    <br>
                    qua puoi
                    <br>
                    scannerizare il
                    <br>
                    QR quando
                    <br>
                    fai un aquisto
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-2">
                <a href="{{ route('shop_map') }}">
                    <div class="rounded-circle">
                        <img src="{{ asset('icons/world.svg') }}" class="icon-help-small center-icon">
                    </div>
                </a>
            </div>
            <div class="col-10">
                <h5 class="mb-1">
                    <strong>Mappa</strong>
                    <br>
                    qua trovi tutti
                    <br>
                    negozi che
                    <br>
                    aderiscono a
                    <br>
                    Crop
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-2">
                <a href="{{ route('charity') }}">
                    <div class="rounded-circle">
                        <img src="{{ asset('icons/search.svg') }}" class="icon-help-small center-icon">
                    </div>
                </a>
            </div>
            <div class="col-10">
                <h5 class="mb-1">
                    <strong>Realta'</strong>
                    <br>
                    qua trovi tutte
                    <br>
                    le realta'
                    <br>
                    sostenibili su
                    <br>
                    Crop
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-2">
                <a href="{{ route('user_help') }}">
                    <div class="rounded-circle">
                        <img src="{{ asset('icons/seme 1.svg') }}" class="icon-help-small center-icon">
                    </div>
                </a>
            </div>
            <div class="col-10">
                <h5 class="mb-1">
                    <strong>Aiuto</strong>
                    <br>
                    questa pagina
                    <br>
                    qua!
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="mb-1">
                    Il <strong>Dashboard</strong> ti permette di: 
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="mb-1">
                    Vedere quanti Coin hai
                    <br>
                    accumulato nel mese e
                    <br>
                    da quando utilizzi Crop.
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-9">
                <h5 class="mb-1">
                    Modificare il tuo
                    <br>
                    portofolio di
                    <br>
                    donazioni.
                </h5>
            </div>
            <div class="col-3">
                <div class="option-btn rounded-circle bg-light-green p-2">
                    <a href="{{ route('portfolio_selection') }}">
                        <img src="{{ asset('icons/pen.svg') }}">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="mb-1">
                    Modificare i tuoi dati
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-12">
                <h5 class="mb-1">
                    Il <strong>QR</strong> si utilizza quando
                    <br>
                    stai finalizando una
                    <br>
                    spesa. Basta chiedere
                    <br>
                    al inserviente di farti
                    <br>
                    vedere il QR, e con una 
                    <br>
                    semplice foto ti 
                    <br>
                    vengono trasferiti i Coin. 
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="mb-1">
                    Con la <strong>Mappa</strong> trovi tutti
                    <br>
                    i negozi aderenti a Crop.
                    <br>
                    Basta che sposti il dito e 
                    <br>
                    cerchi il logo di Crop, poi 
                    <br>
                    con un click scopri
                    <br>
                    informazioni sul negozio.
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-right-chat fade-in-chat">
        <div class="row help-right-pill crop-green">
            <div class="col-12">
                <h5 class="mb-1">
                    Le <strong>Realta'</strong> sono tutte le
                    <br>
                    organizzazioni di beneficienza
                    <br>
                    che aderiscono a Crop e che 
                    <br>
                    tu puoi fare donazioni!
                </h5>
            </div>
        </div>
    </div>

    <div class="row help-left-chat fade-in-chat">
        <div class="row help-left-pill crop-yellow">
            <div class="col-12">
                <h5 class="mb-1">
                    Modificare il tuo portofolio
                    <br>
                    di donazioni.
                </h5>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function() { 
            $('.fade-in-chat').each(function(fadeInDiv){
                $(this).delay(fadeInDiv * 500).fadeIn(500);
                $(this).css("z-index", "100");
            });
        });
    </script>

@endsection