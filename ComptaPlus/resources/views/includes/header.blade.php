<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ComptaPlus - @yield('title', 'Votre Titre')</title>
    @vite(['resources/css/app.css', 'resources/sass/style.scss','resources/js/app.js'])
</head>

<body>
    <header>
        <nav>
            <div class="title">
                
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#fff" class="bi bi-plus-circle" viewBox="0 0 16 16">
                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4" />
                </svg>
                <h2><a href="/">ComptaPlus</a></h2>
            </div>
            <div class="link"></div>
            <div class="login">
                <a href="http://">login</a>
            </div>
        </nav>

    </header>