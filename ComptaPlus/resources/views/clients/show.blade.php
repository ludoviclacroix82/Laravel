@extends('layouts.default')

@section('title', 'View Clients')


@section('content')
    <main id='clients-show'>
        <section>
            <div class="wrap">
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
                    <button class="button-blue">
                        <a href="/admin/clients/edit/{{$client->id}}">Update</a>
                    </button>
                    <button class="button-custom">
                        <a href="/admin/clients/delete/{{$client->id}}">Delete</a>
                    </button>
                </div>
            </div>
        </section>
    </main>
@endsection