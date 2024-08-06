@extends('layouts.default')

@section('title', 'Gestion des invoices')


@section('content')

<main id='invoices'>
    <section>
        <div class="tools">
            @Auth()
            <button class="button-custom">
                <a href="{{route('admin.invoices.create')}}">
                    Création invoices
                </a>
            </button>
            @endAuth()
        </div>
        <div class="tools-links">
            <a href="{{URL::previous()}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                </svg>
                Retour Clients
            </a>
        </div>
        <div class="header">
            Invoices : {{$clients->company}}
        </div>
        <div class="pagination">
            {{ $invoices->links() }}
        </div>
        <x-table-invoices :invoices="$invoices" />
        <div class="pagination">
            {{ $invoices->links() }}
        </div>
    </section>
</main>
@endsection