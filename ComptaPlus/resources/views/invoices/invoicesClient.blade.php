@extends('layouts.default')

@section('title', 'Gestion des invoices')


@section('content')

<main id='invoices'>
    <section>
        <div class="tools">
            <button class="button-custom">
                <a href="/admin/invoices/add">
                    Création invoices
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