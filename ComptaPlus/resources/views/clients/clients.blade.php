@extends('layouts.default')

@section('title', 'Gestion des Clients')


@section('content')

<main id='clients'>

    <section>
        <div class="tools">
            <button class="button-custom">
                <a href="./admin/clients/add">
                    Création Clients
                </a>
            </button>
        </div>
        @if (session('noFound'))
        <div class="alert alert-danger">
            {{ session('noFound') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif
        <div class="header">
            Clients
        </div>
        <div class="pagination">
            {{ $clients->links() }}
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
                    <th>Invoice</th>
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
                    <td>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-folder" viewBox="0 0 16 16">
                            <path d="M.54 3.87.5 3a2 2 0 0 1 2-2h3.672a2 2 0 0 1 1.414.586l.828.828A2 2 0 0 0 9.828 3h3.982a2 2 0 0 1 1.992 2.181l-.637 7A2 2 0 0 1 13.174 14H2.826a2 2 0 0 1-1.991-1.819l-.637-7a2 2 0 0 1 .342-1.31zM2.19 4a1 1 0 0 0-.996 1.09l.637 7a1 1 0 0 0 .995.91h10.348a1 1 0 0 0 .995-.91l.637-7A1 1 0 0 0 13.81 4zm4.69-1.707A1 1 0 0 0 6.172 2H2.5a1 1 0 0 0-1 .981l.006.139q.323-.119.684-.12h5.396z" />
                        </svg>
                    </td>
                    <td>{{$client->updated_at_format}}</td>
                    <td>{{$client->created_at_format}}</td>
                    <td>
                        <a href="clients/show/{{$client->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                            </svg>
                        </a>
                        <a href="/admin/clients/edit/{{$client->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                            </svg>
                        </a>
                        <a href="/admin/clients/delete/{{$client->id}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="red" class="bi bi-trash2" viewBox="0 0 16 16">
                                <path d="M14 3a.7.7 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225A.7.7 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2M3.215 4.207l1.493 8.957a1 1 0 0 0 .986.836h4.612a1 1 0 0 0 .986-.836l1.493-8.957C11.69 4.689 9.954 5 8 5s-3.69-.311-4.785-.793" />
                            </svg>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
        <div class="pagination">
            {{ $clients->links() }}
        </div>
    </section>
</main>

@endsection