@extends('layouts.default')

@section('title', 'Profil')


@section('content')
<main id='admin'>
    <section>
        <div class="container-fluid">
            <div class="row">
                <x-profil-nav />
                <main role="main" class="col-md-10 ms-sm-auto px-4">
                    <h3 class="mt-3">Bonjour, {{Auth::user()->name}} !</h3>
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de Inbox</h5>
                                    <p class="card-text" id="client-count">{{$inboxCount}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Nombre de Factures</h5>
                                    <p class="card-text" id="invoice-count">{{$invoicesCount}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-6 pt-3">
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
                                            @foreach($invoices as $invoice)
                                            <tr>
                                                <td class="w-10">{{ $invoice->ref}}</td>
                                                <td class="w-80">{{ $invoice->title}}</td>
                                                <td class="w-10-action">
                                                    <a href="{{route('invoice.show',$invoice->id)}}" class="text-muted"><i class="fas fa-eye"></i></a>
                                                    @if($invoice->to_conclude === 0)
                                                    <i class="fas fa-unlock" title='unclosed'></i>
                                                    @else
                                                    <i class="fas fa-lock" title='Contact the administrator to reopen the invoices.'></i>
                                                    @endif
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{$invoices->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-6 pt-3">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Receiver Inbox</h5>
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th class="w-10">Subject</th>
                                                <th class="w-80">Send User</th>
                                                <th class="w-10-action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inboxDatasReciever as $inbox)
                                            <tr>
                                                <td class="w-10">{{ $inbox->subject}}</td>
                                                <td class="w-80">{{ $inbox->user}}</td>
                                                <td class="w-10-action">
                                                    <a href="" class="text-muted"><i class="fas fa-eye"></i></a>
                                                </td>
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
                                    <h5 class="card-title">Send Inbox</h5>
                                    <table class="table w-100">
                                        <thead>
                                            <tr>
                                                <th class="w-10">Subject</th>
                                                <th class="w-80">Receiver User</th>
                                                <th class="w-10-action">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($inboxDatasSend as $inbox)
                                            <tr>
                                            <td class="w-10">{{ $inbox->subject}}</td>
                                            <td class="w-80">{{ $inbox->user}}</td>
                                                <td class="w-10-action">
                                                    <a href="" class="text-muted"><i class="fas fa-eye"></i></a>                                                   
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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