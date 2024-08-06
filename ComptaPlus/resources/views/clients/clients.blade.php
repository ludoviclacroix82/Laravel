@extends('layouts.default')

@section('title', 'Gestion des Clients')


@section('content')

<main id='clients'>

    <section>
        <div class="tools">
        @Auth()
            <button class="button-custom">
                <a href="{{ route('admin.clients.create') }}">
                    Création Clients
                </a>
            </button>
         @endAuth
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
        <x-table-clients :clients="$clients" />
        <div class="pagination">
            {{ $clients->links() }}
        </div>
    </section>
</main>

@endsection