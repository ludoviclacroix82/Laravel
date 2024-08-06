@extends('layouts.default')

@section('title', 'Dashboard')


@section('content')

<main id='admin'>

    <section>
    <div class="container-fluid">
            <div class="row">
                <x-admin-nav />
                <main role="main" class="col-md-10 ms-sm-auto px-4">
                    <h3 class="mt-3">Bonjour, {{Auth::user()->name}} !</h3>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de Clients</h5>
                                    <p class="card-text" id="client-count">{{$datas['numberClients']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de Factures</h5>
                                    <p class="card-text" id="invoice-count">{{$datas['numberInvoices']}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre d'Utilisateurs</h5>
                                    <p class="card-text" id="user-count">{{$datas['numberUsers']}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-6 pt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Clients</h5>
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th class="w-10">ID</th>
                                                <th class="w-80">Nom</th>
                                                <th class="w-10-action">Action</th>
                                            </tr>
                                        </thead>                                       
                                        <tbody>
                                             @foreach($datas['lastClients'] as $client)
                                            <tr>
                                                <td class="w-10">{{$client->id}}</td>
                                                <td class="w-80">{{$client->company}}</td>
                                                <td class="w-10-action"><a href="{{route('client.show',$client->id)}}" class="text-muted"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Factures</h5>
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th class="w-10">Ref</th>
                                                <th class="w-80">Title</th>
                                                <th class="w-10-action">Action</th>
                                            </tr>
                                        </thead>                                       
                                        <tbody>
                                             @foreach($datas['lastInvoices'] as $invoices)
                                            <tr>
                                                <td class="w-10">{{$invoices->ref}}</td>
                                                <td class="w-80">{{$invoices->title}}</td>
                                                <td class="w-10-action"><a href="{{route('invoice.show',$invoices->id)}}" class="text-muted"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-6 pt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Users</h5>
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th class="w-10">name</th>
                                                <th class="w-70">Email</th>
                                                <th class="w-10">Type</th>
                                                <th class="w-10-action">Action</th>
                                            </tr>
                                        </thead>                                       
                                        <tbody>
                                             @foreach($datas['lastUsers'] as $user)
                                            <tr>
                                                <td class="w-10">{{$user->name}}</td>
                                                <td class="w-70">{{$user->email}}</td>
                                                <td class="w-70">{{$user->role}}</td>
                                                <td class="w-10-action"><a href="" class="text-muted"><i class="fas fa-eye"></i></a></td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

</main>
@endsection