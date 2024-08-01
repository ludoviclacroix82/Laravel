@extends('layouts.default')

@section('title', 'Delete Client')

@section('content')

<main id="clients-admin">
    <section>
        <div class="delete">
            <form action="/admin/clients/delete/{{$clients->id}}" method="post">
                @if($clients)
                @method('delete')
                @endif
                @csrf 
                <div class="header">
                    <h2>Client : <strong>{{$clients->company}}</strong></h2>
                </div>
                <div class="button">
                    <button class="button-blue">
                        <a href="/clients">Annuler</a>
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