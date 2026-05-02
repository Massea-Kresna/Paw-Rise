@extends('layouts.app')

@section('body')
    @include('partials.navbar-public')
    <main>
        @yield('content')
    </main>
    @include('partials.footer')
@endsection
