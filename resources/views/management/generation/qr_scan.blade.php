@extends('layouts.management')
@section('content')

<div class="columns">
	<div class="column is-6">
		<h1 class="title">
			Generation Creation
		</h1>
	</div>
</div>

<div class="box">

    <div class="qr-reader-container">
        <div id="loadingMessage" hidden="false">⌛ Loading video...</div>
        <canvas id="canvas" height="300" width="300" class="rounded-circle"></canvas>
        <div id="output">
            <div id="outputMessage">Per scannerizzare il QR, è necessario concedere l'accesso alla fotocamera</div>
        </div>
    </div>


    <form id="scanning_form" action="/generation/manage/qr_scan_in" method="POST">
        @csrf
        <input type="hidden" name="qr_code" id="form_qr_code">
    </form>
    <script src="{{ asset('js/jsQR.js') }}"></script>
    <script src="{{ asset('js/cropQR.js') }}"></script>

</div>

@endsection