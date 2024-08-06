<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComptaPlus - @yield('title', 'Votre Titre')</title>
    @vite(['resources/css/app.css', 'resources/sass/style.scss','resources/js/app.js'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"> <!-- Pour les icônes -->

</head>

<body>
    <header>
        @if (session('noFound'))
        <div class="alert alert-danger">
            {{ session('noFound') }}
        </div>
        @endif
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <nav>
            <div class="title">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                <h2>
                    <a href="/">ComptaPlus</a>
                </h2>
                <div class="user">
                @auth
                [ {{Auth::user()->name}} ]
                @endauth                
                </div>
            </div>
            <div class="link">
                <a href="/">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z" />
                    </svg>
                </a>
                <a href="/clients">Clients</a>
                <a href="/invoices">Invoices</a>
                @can('admin.index')
                <a href="/admin">Admin</a>
                @endcan
            </div>
            <div class="login">
                @guest
                <a href="/login">login</a>
                @endguest
                @auth
                <form action="{{route('auth.logout')}}" method='post'>
                    @method('delete')
                    @csrf
                    <button class="button-custom">Logout</button>
                </form>
                @endauth
            </div>
        </nav>

    </header>