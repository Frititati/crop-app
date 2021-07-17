@extends('layouts.management')
@section('content')

<div class="columns">
    <div class="column is-6">
        <h1 class="title">
            Generation ID : {{ $generation->id }}
        </h1>
    </div>
</div>

<div class="box">
    <h1 class="title is-4">
        Info
    </h1>
    <div class="columns">
        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Code
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $generation->code }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Shop
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $generation->shop->name }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Amount to Generate
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $generation->amount }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Is Concluded
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $generation->done ? "Yes" : "No" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Is Static
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $generation->is_static ? "Yes" : "No" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Is Active
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $generation->is_active ? "Yes" : "No" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Total Coins Generated
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ count($coins) }}
                    </td>
                </tr>
            </table>
        </div>
    </div>
</div>

<div class="columns">
    <div class="column is-narrow">
        <div class="box">
            <img src="https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl={{ $encrypted_qr_code }}&chld=M|0" class="mx-auto" alt="Generated QR Code">
        </div>
    </div>
</div>

<div class="box">
    <h1 class="title is-4">
        Coins Associated
    </h1>
    <table class="table is-fullwidth is-bordered">
        <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    User Associated
                </th>
                <th>
                    Group
                </th>
                <th>
                    Received At
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach($coins as $coin)
                <tr>
                    <td>
                        {{ $coin->id }}
                    </td>
                    <td>
                        {{ $coin->user->username }}
                    </td>
                    <td>
                        {{ $coin->group ?? "" }}
                    </td>
                    <td>
                        {{ $coin->received_at ?? "" }}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection