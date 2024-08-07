@extends('layouts.default')

@section('title', 'Delete User')

@section('content')

<main id="user-admin">
    <section>
        <div class="delete">
        <div class="tools-links">
            <a href="{{URL::previous()}}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                </svg>
                Retour users
            </a>
        </div>
            <form action="{{route('admin.users.delete',$users->id)}}" method="post">
                @if($users)
                @method('delete')
                @endif
                @csrf 
                <input type="hidden" name="previous_url" value="{{ url()->previous() }}">
                <div class="header">
                    <h2>Client : <strong>{{$users->name}}</strong></h2>
                </div>
                <div class="button">
                    <button class="button-blue">
                        <a href="{{URL::previous()}}">Annuler</a>
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