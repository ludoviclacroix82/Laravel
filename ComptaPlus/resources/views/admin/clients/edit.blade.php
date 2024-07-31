@extends('layouts.default')

@section('title', 'Ajout Clients')


@section('content')

<main id='clients-admin'>

    <section>
    <x-clients-form  :clients="$clients" />
    </section>

</main>
@endsection