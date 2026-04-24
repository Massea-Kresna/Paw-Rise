@extends('layouts.app')

@section('content')

<div class="card p-4 shadow">

    <img src="{{ $animal->image }}" class="img-fluid mb-3">

    <h3>{{ $animal->name }}</h3>
    <p>{{ $animal->description }}</p>

    <form method="POST" action="/adopt/{{ $animal->id }}">
        @csrf

        <textarea name="reason" class="form-control mb-2" placeholder="Alasan adopsi"></textarea>
        <textarea name="experience" class="form-control mb-2" placeholder="Pengalaman"></textarea>

        <button class="btn btn-success">Ajukan Adopsi</button>
    </form>

</div>

@endsection