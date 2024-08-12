@extends('layouts.default')

@section('title', 'Update Invoices')


@section('content')

<main id='invoices-admin'>
    
    <section>
    <x-invoices-form :invoices="$invoices" :clientsAll="$clients" :usersAll='$users' />
    </section>

</main>
@endsection