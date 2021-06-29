@extends('layouts.management')
@section('content')

<div class="columns">
    <div class="column is-6">
        <h1 class="title">
            {{ $shop->name ?? "-" }}; {{ $shop->second_name ?? "-" }}
        </h1>
    </div>
    <div class="column">
        <a href="/shop/manage/{{ $shop->id }}/edit" class="button is-warning">
            Edit Shop Details
        </a>
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
                        Name
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->name ?? "-" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Second Name
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->second_name }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Category
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->category }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Address
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->address }}
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
                        {{ $shop->is_active ? "Yes" : "No" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Total Coins
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
    <div class="columns">
        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Description
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->description ?? "-" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Phone Number
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->phone_number }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Latitude
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->latitude }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Longitude
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->longitude }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Website URL
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->website_url }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Social Link
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $shop->social_link }}
                    </td>
                </tr>
            </table>
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