@extends('layouts.default')

@section('title', 'Dashboard :: User')


@section('content')
<main id='user-admin'>
<section>
    <x-user-form :roles='$roles' />
</section>
</main>
@endsection