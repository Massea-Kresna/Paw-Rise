@extends('layouts.shelter')
@section('title', 'Tambah Hewan - PawRise Shelter')
@section('content')

<h3 class="fw-bold mb-3">Tambah Hewan Baru</h3>

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('shelter.animals.store') }}" enctype="multipart/form-data" class="pr-card p-4">
    @include('shelter.animals._form')
    <div class="text-end mt-4">
        <a href="{{ route('shelter.animals.index') }}" class="btn btn-outline-secondary">Batal</a>
        <button type="submit" class="btn pr-btn-primary">Simpan</button>
    </div>
</form>

@endsection