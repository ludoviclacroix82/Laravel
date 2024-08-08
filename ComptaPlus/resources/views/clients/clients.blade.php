@extends('layouts.default')

@section('title', 'Gestion des Clients')


@section('content')

<main id='clients'>
    <section>
        <livewire:clients-tables />
    </section>
</main>

@endsection