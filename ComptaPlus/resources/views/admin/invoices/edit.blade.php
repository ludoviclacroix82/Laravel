@extends('layouts.default')

@section('title', 'Update Invoices')


@section('content')

<main id='invoices-admin'>

    <section>
    <x-invoices-form :invoices="$invoices" />
    </section>

</main>
@endsection