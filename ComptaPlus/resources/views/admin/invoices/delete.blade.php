@extends('layouts.default')

@section('title', 'Delete Invoices')

@section('content')

<main id="invoices-admin">
    <section>
        <div class="delete">
            <form action="/admin/invoices/delete/{{$invoices->id}}" method="post">
                @if($invoices)
                @method('delete')
                @endif
                @csrf 
                <div class="header">
                    <h2>Invoices : <strong>{{$invoices->ref}}</strong></h2>
                    {{$invoices->title}}
                </div>
                <div class="button">
                    <button class="button-blue">
                        <a href="/invoices">Annuler</a>
                    </button>
                    <button class="button-custom" type="submit">
                        Supprimer
                    </button>
                </div>
            </form>
        </div>
    </section>
</main>

@endsection