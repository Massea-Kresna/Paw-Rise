@extends('layouts.shelter')
@section('title', 'Edit Hewan - PawRise Shelter')
@section('content')
<div class="container-fluid p-4">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-shelter')</div>
        <div class="col-lg-9">
            <h3 class="fw-bold mb-3">Edit Data {{ $animal->name }}</h3>
            @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul></div>@endif

            <form method="POST" action="{{ route('shelter.animals.update', $animal) }}" enctype="multipart/form-data" class="pr-card p-4">
                @method('PUT')
                @include('shelter.animals._form', ['animal' => $animal])
                <div class="text-end mt-4">
                    <a href="{{ route('shelter.animals.index') }}" class="btn btn-outline-secondary">Batal</a>
                    <button type="submit" class="btn pr-btn-primary">Perbarui</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
