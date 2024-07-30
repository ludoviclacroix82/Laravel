@extends('layouts.default')

@section('title', 'Gestion des Clients')


@section('content')

<main id='clients'>

    <section>
        <div class="tools">
            <button class="button-custom">
                <a href="./admin/clients/add">
                    Création CLients
                </a>                
            </button>
        </div>
        <div class="header">
            Clients
        </div>
    <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Company</th>
            <th>Phone</th>
            <th>Email</th>
            <th>Address</th>
            <th>TVA</th>
            <th>Invoice ID</th>
            <th>Updated At</th>
            <th>Created At</th>
            <th>Operation</th>
        </tr>
    </thead>
    <tbody>
        @if($clients->isEmpty())
            <tr>
                <th colspan="10" class="noClients">Aucun clients</th>
            </tr>
        @else
            @foreach($clients as $client)
                <tr>
                    <td>{{$client->id}}</td>
                    <td>{{$client->company}}</td>
                    <td>{{$client->phone}}</td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->address}}</td>
                    <td>{{$client->tva}}</td>
                    <td>{{$client->invoices_id}}</td>
                    <td>{{$client->updated_at}}</td>
                    <td>{{$client->created_at}}</td>
                    <th></th>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

    </section>
</main>

@endsection