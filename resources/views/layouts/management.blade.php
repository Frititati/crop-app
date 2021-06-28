<!doctype html>
<html style="height: 100%" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Management</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <!-- <script src="{{ asset('js/layout.js') }}" defer></script> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/desktop_style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.2/css/bulma.min.css" integrity="sha512-byErQdWdTqREz6DLAA9pCnLbdoGGhXfU6gm1c8bkf7F51JVmUBlayGe2A31VpXWQP+eiJ3ilTAZHCR3vmMyybA==" crossorigin="anonymous" />
        <script src="https://kit.fontawesome.com/9dfeb1f56f.js" crossorigin="anonymous"></script>
    </head>

    <body style="background-color: @yield('background-color', '#f6faf8'); min-height: 100%;">

        <nav class="navbar" role="navigation" aria-label="main navigation">

            <div class="navbar-brand">
                <a class="navbar-item" href="/">
                    <img src="{{ asset('icons/crop-logo.png') }}">
                </a>

                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>

            <div id="navbarBasicExample" class="navbar-menu">

                <div class="navbar-start">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Shop
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/shop/manage">
                                List All
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Charity
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/charity/manage">
                                List
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item">
                                filler
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            Generation
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item" href="/generation/manage">
                                List
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="/generation/manage/create">
                                Create
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="/generation/manage/qr_scan_out">
                                QR Test
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="/generation/manage/download_static" target="_blank">
                                Download All Static
                            </a>
                        </div>
                    </div>

                    <div class="navbar-item has-dropdown is-hoverable is-mega">
                        <a class="navbar-link">
                            Reserve
                        </a>
                        <div class="navbar-dropdown">
                            <div class="container is-fluid">
                                <div class="columns">
                                    <div class="column">
                                        <a class="navbar-item" href="/charity/manage">
                                            Reserve
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="navbar-end">

                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{ Auth::user()->name }}
                        </a>
                        <div class="navbar-dropdown">
                            <a class="navbar-item">
                                {{ date('d M, H:i T', time()) }}
                            </a>
                            <hr class="navbar-divider">
                            <a class="navbar-item" href="/dashboard">
                                Dashboard
                            </a>
                            <hr class="navbar-divider">
                            <form id="log_out_form" method="POST" action="/logout">
                                @csrf
                                <a class="navbar-item" onclick="document.getElementById('log_out_form').submit();">
                                    Log Out
                                </a>
                            </form>
                            <!-- <hr class="navbar-divider">
                                <a class="navbar-item">
                                     Report an issue
                                </a> -->
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <section class="section p-2" id="section_id">

            @if($errors->any())
                <div id="generic_error" class="notification is-danger">
                    {{$errors->first()}}
                </div>

                <script type="text/javascript">
                    setTimeout(genericClearMessage, 10000);
                    function genericClearMessage() {
                        document.getElementById('generic_error').style.display = "none";
                    }
                </script>
            @endif

            @if(session()->has('error'))
                <div id="generic_error" class="notification is-danger">
                    {{session()->get('error')}}
                </div>

                <script type="text/javascript">
                    setTimeout(genericClearMessage, 10000);
                    function genericClearMessage() {
                        document.getElementById('generic_error').style.display = "none";
                    }
                </script>
            @endif

            @if(session()->has('message'))
                <div id="return_message" class="notification is-success">
                    {{ session()->get('message') }}
                </div>
                <script type="text/javascript">
                    setTimeout(clearMessage, 10000);
                    function clearMessage() {
                        document.getElementById('return_message').style.display = "none";
                    }
                </script>
                @php
                    session()->forget('message');
                @endphp
            @endif

            @yield('content')

        </section>
    </body>
</html>
