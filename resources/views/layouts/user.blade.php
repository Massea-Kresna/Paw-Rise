@extends('layouts.app')

@section('body')
    @include('partials.navbar-public')
   <main class="container py-4" style="min-height: calc(100vh - 200px);">
        <div class="row g-4">
            <aside class="col-lg-3">
                @include('partials.sidebar-user')
            </aside>
            <section class="col-lg-9">
                @yield('content')
            </section>
        </div>
    </main>
    @include('partials.footer')
@endsection
