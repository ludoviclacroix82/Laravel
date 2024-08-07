@extends('layouts.default')

@section('title', 'Dashboard :: User')


@section('content')
<main id='user-admin'>
    <section>
        <x-user-form :users='$users' :roles='$roles' />
    </section>
</main>
@endsection