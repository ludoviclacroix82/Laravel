@extends('layouts.default')

@section('title', 'Delete Invoices')

@section('content')

<main id="invoices-admin">
    <section>
        <div class="delete">
            <div class="tools-links">
                <a href="/invoices">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                    </svg>
                    Retour Invoices
                </a>
            </div>
            <form action="{{ route('admin.invoices.unclosed', $invoices->id) }}" method="post">
                @csrf
                <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                <div class="header">
                    <h2>Invoices : <strong>{{$invoices->ref}}</strong></h2>
                    {{$invoices->title}}
                </div>
                <div class="button">
                    <button class="button-blue">
                        <a href="/invoices">Annuler</a>
                    </button>
                    <button class="button-custom" type="submit">
                        To conclude
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

@endsection