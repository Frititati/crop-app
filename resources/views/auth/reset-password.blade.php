<!doctype html>
<html lang="it">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no, maximum-scale=1, user-scalable=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}">
    <title>Password Reset</title>

    <meta name="apple-mobile-web-app-title" content="Crop">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
</head>

<body>

    @if($errors->any())
        <div id="generic_error" class="notification is-error">
            {{$errors->first()}}
        </div>

        <script type="text/javascript">
            setTimeout(genericClearMessage, 20000);
            function genericClearMessage() {
                document.getElementById('generic_error').style.display = "none";
            }
        </script>
    @endif

    <div class="container-fluid d-flex utility flex-column justify-content-center px-5">

        <div class="d-flex justify-content-start">
            <h5 class="font-weight-bold">Modifica la password</h5>
        </div>

        <div class="d-flex justify-content-end">
            <h6>
                {{ $request->email }}
            </h6>
        </div>

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="input-group-container mb-2">
                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="password" class="form-control text-input-login" placeholder="Nuova password..." aria-describedby="nuova-password" name="password" required>
                    </div>
                </div>

                <div class="d-flex flex-row input-group-user-edit bg-color-crop-white px-4">
                    <div class="input-group">
                        <input type="password" class="form-control text-input-login" placeholder="Conferma nuova password..." aria-describedby="conferma-nuova-password" name="password_confirmation" required>
                    </div>
                </div>
            </div>


            <div class="d-flex flex-row justify-content-center">
                <div class="form-check">
                    <input type="checkbox" id="privacy_check_checkbox" name="privacy_check" class="form-check-input" required/>
                    <label for="privacy_check_checkbox" class="form-check-label">Do you agree with the terms and conditions</label>
                </div>
            </div>
            
            <div class="d-flex flex-row justify-content-center">
                <input type="submit" class="btn btn-yellow-crop" value="Modifica Password"/>
            </div>

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">
            <!-- Email User -->
            <input type="hidden" name="email" value="{{ $request->email }}">

        </form>

   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <script src="{{ asset('js/resize.js') }}"></script>

</body>

</html>
