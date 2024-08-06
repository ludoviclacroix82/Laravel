@extends('layouts.default')

@section('title', 'Dashboard::Invoices')


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
                            <a href="{{route('admin.invoices.create')}}">
                                Création invoices
                            </a>
                        </button>
                        @endauth
                    </div>
                    <div class="header">
                        Invoices
                    </div>
                    <div class="pagination">
                        {{ $invoices->links() }}
                    </div>
                    <x-table-invoices :invoices="$invoices" />
                    <div class="pagination">
                        {{ $invoices->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
</section>
@endsection