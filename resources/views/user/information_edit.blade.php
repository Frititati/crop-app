@extends('layouts.crop_base_phone')

@section('title')
    Modifica Utente
@endsection

@section('content')
    <div class="container-fluid ui d-flex flex-column justify-content-center px-4">

        <a href="{{ route('dashboard') }}">
            <div class="d-flex flex-row align-content-start mb-2">
                <img src="{{ asset('icons/back-arrow.svg') }}">
            </div>
        </a>

        <form action="/user_setting/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="d-flex justify-content-start">
                <h5 class="font-weight-bold">Modifica le tue informazioni personali</h5>
            </div>
            <div class="input-group-container mb-2">
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="email" class="form-control text-input-login" placeholder="Email..." name="email" value="{{$user->email}}" aria-describedby="email-logo" required>
                    </div>
                </div>
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="text" class="form-control text-input-login" placeholder="Username..." name="username" value="{{$user->username}}" aria-describedby="username" required>
                    </div>
                </div>

            </div>
            <div class="input-group-container mb-2">
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="text" class="form-control text-input-login" placeholder="Nome..." name="name" value="{{$user->name}}" aria-describedby="name" required>
                    </div>
                </div>
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="text" class="form-control text-input-login" placeholder="Cognome..." name="surname" value="{{$user->surname}}" aria-describedby="surname" required>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center mb-5">
                <input type="submit" class="btn btn-yellow-crop" value="Modifica"/>
            </div>
            <input type="hidden" name="action" value="general">
        </form>

        <!-- FORM 2 -->

        <form action="/user_setting/{{ $user->id }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="d-flex justify-content-start">
                <h5 class="font-weight-bold">Modifica la password</h5>
            </div>
            <div class="input-group-container mb-2">
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="password" class="form-control text-input-login" placeholder="Vecchia password..." name="old_password" aria-describedby="vecchia-password" required>
                    </div>
                </div>
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="password" class="form-control text-input-login" placeholder="Nuova password..." name="new_password" aria-describedby="nuova-password" required>
                    </div>
                </div>

                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="password" class="form-control text-input-login" placeholder="Conferma nuova password..." name="confirm_password" aria-describedby="conferma-nuova-password" required>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-row justify-content-center">
                <input type="submit" class="btn btn-yellow-crop" value="Modifica Password"/>
            </div>

            <input type="hidden" name="action" value="password">
        </form>

@endsection
