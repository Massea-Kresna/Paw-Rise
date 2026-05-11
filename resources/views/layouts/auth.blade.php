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
                <a href="{{ route('home') }}" class="pr-brand">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 100 100" fill="var(--pr-orange)">
                        <ellipse cx="25" cy="18" rx="11" ry="14"/>
                        <ellipse cx="50" cy="11" rx="11" ry="14"/>
                        <ellipse cx="75" cy="18" rx="11" ry="14"/>
                        <ellipse cx="13" cy="44" rx="9" ry="12"/>
                        <ellipse cx="87" cy="44" rx="9" ry="12"/>
                        <path d="M50 34 C33 34 20 45 20 58 C20 70 30 80 50 80 C70 80 80 70 80 58 C80 45 67 34 50 34Z"/>
                    </svg>
                    <span>PawRise</span>
                </a>
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
