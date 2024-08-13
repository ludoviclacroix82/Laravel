@extends('layouts.default')

@section('title', 'Inbox')


@section('content')
<main id='admin'>
    <section>
        <div class="container-fluid">
            <div class="row">
                <x-profil-nav />
                <main role="main" class="col-md-10 ms-sm-auto px-4">
                    <div class="row mt-12 pt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Receiver Inbox</h5>
                                    <livewire:inbox-receiver/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-12 pt-3">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title"> Send Inbox</h5>
                                    <livewire:inbox-send />
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </section>

</main>
@endsection