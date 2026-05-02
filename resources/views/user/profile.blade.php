@extends('layouts.user')
@section('title', 'Profil Saya - PawRise')
@section('content')
<div class="container py-5">
    <div class="row g-4">
        <div class="col-lg-3">@include('partials.sidebar-user')</div>
        <div class="col-lg-9">
            <div class="pr-card p-4 p-md-5">
                <h3 class="fw-bold mb-4">Profil Saya</h3>
                @if(session('success'))<div class="alert alert-success">{{ session('success') }}</div>@endif
                @if($errors->any())<div class="alert alert-danger"><ul class="mb-0">@foreach($errors->all() as $e)<li>{{$e}}</li>@endforeach</ul></div>@endif

                <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data" class="row g-3">
                    @csrf
                    <div class="col-md-3 text-center">
                        <img src="{{ auth()->user()->profilePhotoUrl() }}" alt="" class="rounded-circle mb-2" style="width:120px; height:120px; object-fit:cover;">
                        <input type="file" name="photo" class="form-control form-control-sm" accept="image/*">
                    </div>
                    <div class="col-md-9">
                        <div class="row g-3">
                            <div class="col-md-6"><label class="form-label">Nama Lengkap</label><input type="text" name="name" value="{{ old('name', auth()->user()->name) }}" class="form-control" required></div>
                            <div class="col-md-6"><label class="form-label">Email</label><input type="email" name="email" value="{{ old('email', auth()->user()->email) }}" class="form-control" required></div>
                            <div class="col-md-6"><label class="form-label">No. Telepon</label><input type="text" name="phone" value="{{ old('phone', auth()->user()->phone) }}" class="form-control"></div>
                            <div class="col-12"><label class="form-label">Alamat</label><textarea name="address" rows="2" class="form-control">{{ old('address', auth()->user()->address) }}</textarea></div>
                            <div class="col-12"><label class="form-label">Tentang Saya</label><textarea name="bio" rows="3" class="form-control">{{ old('bio', auth()->user()->bio) }}</textarea></div>
                        </div>
                    </div>
                    <div class="col-12 text-end">
                        <button type="submit" class="btn pr-btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
