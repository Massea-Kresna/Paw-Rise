@extends('layouts.app')

@section('body')
    @include('partials.navbar-public')
    <main style="background: #F4F5F9; min-height: calc(100vh - 130px); padding: 36px 0 60px;">
        <div class="container">
            <div class="row g-4">
                <aside class="col-lg-3">
                    @include('partials.sidebar-user')
                </aside>
                <section class="col-lg-9">
                    @yield('content')
                </section>
            </div>
        </div>
    </main>
    @include('partials.footer')
@endsection
