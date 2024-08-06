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
            @endauth
        </div>
        <div class="header">
            Invoices
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