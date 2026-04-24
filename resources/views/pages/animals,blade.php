@extends('layouts.app')

@section('content')

<div class="row">

@foreach($animals as $animal)
<div class="col-md-4 mb-3">
    <div class="card p-3 shadow">

        <img src="{{ $animal->image }}" class="img-fluid mb-2">

        <h5>{{ $animal->name }}</h5>
        <p>{{ $animal->type }} • {{ $animal->age }} tahun</p>

        <a href="/animals/{{ $animal->id }}" class="btn btn-main">
            Detail
        </a>

    </div>
</div>
@endforeach

</div>

@endsection