@extends('layouts.default')

@section('title', 'Gestion des invoices')


@section('content')

<main id='invoices'>
    <section>
       
        <livewire:invoices-tables />
        
    </section>
</main>
@endsection