@extends('layouts.management')
@section('content')

<div class="columns">
    <div class="column is-6">
        <h1 class="title">
            {{ $user->name ?? "-" }} {{ $user->surname ?? "-" }}
        </h1>
    </div>
    <div class="column">
        <a href="/user/manage/{{ $user->id }}/edit" class="button is-warning">
            Edit User Details
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
                        Username
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $user->username ?? "-" }}
                    </td>
                </tr>
            </table>
        </div>

        <div class="column">
            <table class="table is-fullwidth">
                <tr>
                    <th>
                        Email
                    </th>
                </tr>
                <tr>
                    <td>
                        {{ $user->email }}
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
                        {{ $user->is_active ? "Yes" : "No" }}
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