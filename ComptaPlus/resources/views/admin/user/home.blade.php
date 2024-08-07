@extends('layouts.default')

@section('title', 'Dashboard :: User')


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
                            <a href="{{route('admin.users.create')}}">
                                Création User
                            </a>
                        </button>
                        @endauth
                    </div>
                    <div class="header">
                        Users
                    </div>
                    <div class="pagination">
                        {{ $users->links() }}
                    </div>
                    <x-table-user :users="$users" />
                    <div class="pagination">
                        {{ $users->links() }}
                    </div>
                </div>
            </main>
        </div>

</section>

</main>
@endsection