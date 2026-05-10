<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PawRise Shelter - @yield('title', 'Dashboard')</title>
    <link rel="stylesheet" href="{{ asset('css/pawrise.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css">
    @stack('styles')
</head>
<body>


<div class="user-layout">
    @include('partials.sidebar-shelter')


    <div style="flex: 1; margin-left: 260px; min-height: 100vh; background: var(--gray-50);">
        @include('partials.navbar-shelter')


        <main class="main-content" style="padding-top: 32px; margin-top: 64px;">
            @if(session('success'))
                <div class="alert alert-success"><i class="bi bi-check-circle"></i> {{ session('success') }}</div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger"><i class="bi bi-exclamation-circle"></i> {{ session('error') }}</div>
            @endif


            @yield('content')
        </main>
    </div>
</div>


@stack('scripts')
</body>
</html>

