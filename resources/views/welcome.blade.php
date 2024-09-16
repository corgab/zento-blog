<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100 bg-light">

    <div class="text-center">
        <!-- Logo -->
        <img src="{{ asset('images/logo.svg') }}" alt="Logo" width="150" height="150">

        <!-- Titolo del Blog -->
        <h1 class="display-3 fw-bold">{{ config('app.name') }}</h1>

        <!-- Descrizione -->
        <p class="lead text-muted mb-4">
            Benvenuto nella tua area di gestione del blog. Qui puoi creare, modificare e gestire i tuoi post in modo facile e veloce.
        </p>

        <!-- Pulsanti di navigazione -->
        <div class="btn-group mt-4" role="group" aria-label="Navigazione blog">
            <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-2">{{ __('Login') }}</a>
            @auth
            <a href="{{ url('/dashboard') }}" class="btn btn-success btn-lg">{{ __('Go to Dashboard') }}</a>
            @endauth
        </div>
    </div>

    <!-- Bootstrap JS -->
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> --}}
</body>

</html>
