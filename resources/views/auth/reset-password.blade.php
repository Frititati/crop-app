@extends('layouts.crop_base_phone')

@section('title')
    Reset Password
@endsection

@section('content')
    <div class="container-fluid ui d-flex flex-column justify-content-center px-4">

        <!-- FORM 2 -->

        <div class="d-flex justify-content-start">
            <h5 class="font-weight-bold">Modifica la password</h5>
        </div>
        <div class="input-group-container mb-2">
            <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                <div class="input-group">
                    <input type="password" class="form-control text-input-login" placeholder="Vecchia password..."
                           aria-describedby="vecchia-password" required>
                </div>
            </div>
            <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                <div class="input-group">
                    <input type="password" class="form-control text-input-login" placeholder="Nuova password..."
                           aria-describedby="nuova-password" required>
                </div>
            </div>

            <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                <div class="input-group">
                    <input type="password" class="form-control text-input-login" placeholder="Conferma nuova password..."
                           aria-describedby="conferma-nuova-password" required>
                </div>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-center">
            <input type="submit" class="btn btn-yellow-crop" value="Modifica Password"/>
        </div>

@endsection
