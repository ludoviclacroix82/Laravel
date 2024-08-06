@extends('layouts.default')

@section('title', 'Dashboard::Clients')


@section('content')

<section>
    <div class="container-fluid">
        <div class="row">
            <x-admin-nav />
            <main role="main" class="col-md-10 ms-sm-auto px-4">
                <div class="table-admin">
                    <div class="tools">
                        @Auth()
                        <button class="button-custom">
                            <a href="{{route('admin.clients.create')}}">
                                Création Client
                            </a>
                        </button>
                        @endauth
                    </div>
                    <div class="header">
                        Clients
                    </div>
                    <div class="pagination">
                        {{ $clients->links() }}
                    </div>
                    <x-table-clients :clients="$clients" />
                    <div class="pagination">
                        {{ $clients->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@endsection