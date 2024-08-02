@extends('layouts.default')

@section('title', 'Ajout Invoices')


@section('content')

<main id='invoices-admin'>
    <section>
    <x-invoices-form :clientsAll="$clients" />
    </section>
</main>
@endsection