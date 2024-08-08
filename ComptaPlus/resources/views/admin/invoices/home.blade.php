@extends('layouts.default')

@section('title', 'Dashboard::Invoices')


@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <x-admin-nav />
            <main  role="main" class="col-md-10 ms-sm-auto px-4">
                <div class="table-admin">
                    <livewire:invoices-tables /> 
                </div>               
            </main>
        </div>
    </div>
</section>
@endsection