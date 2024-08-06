@extends('layouts.default')

@section('title', 'Dashboard :: Show User')


@section('content')
<main id='users-show'>
    <section>
        <div class="wrap">
            <div class="tools-links">
                <a href="{{URL::previous()}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5M10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5" />
                    </svg>
                    Retour User
                </a>
            </div>
            <div class="header">
                {{$user->name}}
            </div>
            <div class="content">
                <ul>
                    <li>
                        <label>Email</label>
                        {{$user->email}}
                    </li>
                    <li>
                        <label>Role</label>
                        {{$user->role}}
                    </li>
                    <li>
                        <label>Modification</label>
                        {{$user->updated_at}}
                    </li>
                    <li>
                        <label>Creation</label>
                        {{$user->created_at}}
                    </li>
                </ul>
            </div>
            <div class="button">
                <button class="button-blue">
                    <a href="">Update</a>
                </button>
                <button class="button-custom">
                    <a href="">Delete</a>
                </button>
            </div>
        </div>
    </section>
</main>
@endsection