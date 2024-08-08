@extends('layouts.default')

@section('title', 'Dashboard::Clients')


@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <x-admin-nav />
            <main role="main" class="col-md-10 ms-sm-auto px-4">
            <div class="table-admin">
                    <livewire:clients-tables /> 
                </div> 
            </main>
        </div>
    </div>
</section>
@endsection