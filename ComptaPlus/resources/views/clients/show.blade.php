@extends('layouts.default')

@section('title', 'View Clients')


@section('content')
<main id='clients-show'>
    <section>
        <div class="wrap">
            <div class="tools-links">
                <a href="{{URL::previous()}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                    </svg>
                    Retour Clients
                </a>
            </div>
            <div class="header">
                {{$client->company}}
            </div>
            <div class="content">
                <ul>
                    <li>
                        <label>Address</label>
                        {{$client->address}}
                    </li>
                    <li>
                        <label>Phone</label>
                        {{$client->phone}}
                    </li>
                    <li>
                        <label>Email</label>
                        {{$client->email}}
                    </li>
                    <li>
                        <label>TVA</label>
                        {{$client->tva}}
                    </li>
                    <li>
                        <label>Modification</label>
                        {{$client->updated_at}}
                    </li>
                    <li>
                        <label>Creation</label>
                        {{$client->created_at}}
                    </li>
                </ul>
            </div>
            <div class="button">
                @can('update',$client)
                <button class="button-blue">
                    <a href="/admin/clients/edit/{{$client->id}}">Update</a>
                </button>
                @endcan
                @can('delete',$client)
                <button class="button-custom">
                    <a href="/admin/clients/delete/{{$client->id}}">Delete</a>
                </button>
                @endcan
            </div>
        </div>
    </section>
</main>
@endsection