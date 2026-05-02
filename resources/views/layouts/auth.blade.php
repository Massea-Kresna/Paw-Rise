@extends('layouts.app')

@section('body')
<div class="pr-auth">
    <div class="pr-auth-left" style="background-image: linear-gradient(rgba(240,140,42,.65), rgba(240,140,42,.65)), url('{{ $heroImage ?? "https://images.unsplash.com/photo-1543466835-00a7907e9de1?w=1200" }}');">
        <div class="text-center" style="max-width: 460px;">
            <h1 class="mb-3">@yield('hero_title', 'Selamat Datang!')</h1>
            <p class="lead opacity-75">@yield('hero_subtitle', 'Mulai perjalanan mencari teman selamanya')</p>
        </div>
    </div>
    <div class="pr-auth-right">
        <div class="pr-auth-card">
            <div class="text-center mb-3">
                <a href="{{ route('home') }}" class="pr-brand"><i class="bi bi-suit-heart-fill"></i> PawRise</a>
                <p class="text-muted mb-0 mt-1 small">@yield('subtitle', 'Buat akun untuk memulai perjalanan Anda')</p>
            </div>
            <div class="pr-auth-tabs">
                <a href="{{ route('login') }}" class="@yield('tab_login_class', '')">Masuk</a>
                <a href="{{ route('register') }}" class="@yield('tab_register_class', '')">Daftar</a>
            </div>
            @yield('content')
        </div>
    </div>
</div>
@endsection
