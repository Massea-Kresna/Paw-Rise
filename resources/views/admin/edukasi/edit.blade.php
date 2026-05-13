@extends('layouts.admin')
@section('title', 'Edit Konten Edukasi - PawRise Admin')
@section('content')

<style>
.form-card {
    background: #fff; border-radius: 16px; padding: 28px;
    border: 1px solid var(--pr-border);
}
.form-card .form-label {
    font-weight: 600; font-size: .88rem; color: var(--pr-text); margin-bottom: 6px;
}
.form-card .form-control, .form-card .form-select {
    border-radius: 10px; padding: 10px 14px; border-color: var(--pr-border);
}
.form-card .form-control:focus, .form-card .form-select:focus {
    border-color: var(--pr-orange);
    box-shadow: 0 0 0 0.15rem rgba(240,140,42,.18);
}
.form-card textarea.form-control { min-height: 200px; }
.btn-simpan {
    background: var(--pr-orange); color: #fff; font-weight: 700;
    font-size: .9rem; padding: 11px 28px; border-radius: 10px;
    border: none; cursor: pointer; transition: background .15s;
}
.btn-simpan:hover { background: var(--pr-orange-dark); color: #fff; }
.btn-batal {
    background: #fff; color: var(--pr-text-muted); font-weight: 600;
    font-size: .9rem; padding: 11px 28px; border-radius: 10px;
    border: 1.5px solid var(--pr-border); cursor: pointer; transition: all .15s;
    text-decoration: none;
}
.btn-batal:hover { border-color: var(--pr-orange); color: var(--pr-orange); }
.img-preview {
    width: 100%; max-height: 200px; object-fit: cover;
    border-radius: 10px; border: 2px solid var(--pr-border); margin-top: 8px;
}
</style>

<a href="{{ route('admin.edukasi.index') }}" style="font-size:.88rem; color:var(--pr-orange); text-decoration:none; font-weight:600;">
    <i class="bi bi-arrow-left"></i> Kembali ke Daftar Edukasi
</a>

<h3 class="fw-bold mt-3 mb-4">Edit Konten Edukasi</h3>

@if($errors->any())
    <div class="alert alert-danger mb-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('admin.edukasi.update', $edukasi) }}" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="form-card">
        <div class="row g-3">
            {{-- Judul --}}
            <div class="col-12">
                <label class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $edukasi->judul) }}" required>
            </div>

            {{-- Ringkasan --}}
            <div class="col-12">
                <label class="form-label">Ringkasan <span class="text-danger">*</span></label>
                <textarea name="ringkasan" class="form-control" rows="3" required style="min-height: 80px;">{{ old('ringkasan', $edukasi->ringkasan) }}</textarea>
            </div>

            {{-- Konten --}}
            <div class="col-12">
                <label class="form-label">Konten <span class="text-danger">*</span></label>
                <textarea name="konten" class="form-control" required>{{ old('konten', $edukasi->konten) }}</textarea>
            </div>

            {{-- Kategori & Estimasi Baca --}}
            <div class="col-md-6">
                <label class="form-label">Kategori <span class="text-danger">*</span></label>
                <select name="kategori" class="form-select" required>
                    <option value="">Pilih Kategori</option>
                    @foreach(['kesehatan' => 'Kesehatan', 'pelatihan' => 'Pelatihan', 'nutrisi' => 'Nutrisi', 'gaya_hidup' => 'Gaya Hidup', 'lainnya' => 'Lainnya'] as $val => $label)
                        <option value="{{ $val }}" {{ old('kategori', $edukasi->kategori) == $val ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Estimasi Baca (menit)</label>
                <input type="number" name="estimasi_baca" class="form-control" value="{{ old('estimasi_baca', $edukasi->estimasi_baca) }}" min="1">
            </div>

            {{-- Gambar --}}
            <div class="col-12">
                <label class="form-label">Gambar</label>
                @if($edukasi->gambar)
                    <div class="mb-2">
                        <img src="{{ $edukasi->gambar_url }}" class="img-preview" id="currentImage" alt="Gambar saat ini">
                    </div>
                    <small style="color:var(--pr-text-muted); font-size:.8rem;">Upload gambar baru untuk mengganti yang lama</small>
                @endif
                <input type="file" name="gambar" class="form-control mt-1" accept="image/*" id="gambarInput">
                <img id="gambarPreview" class="img-preview" alt="Preview" style="display:none;">
            </div>

            {{-- Publish --}}
            <div class="col-12">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" name="is_published" value="1" id="publishCheck"
                           {{ old('is_published', $edukasi->is_published) ? 'checked' : '' }}
                           style="width:42px; height:22px;">
                    <label class="form-check-label fw-semibold" for="publishCheck" style="margin-left:8px; font-size:.9rem;">
                        Publikasi Artikel
                    </label>
                </div>
            </div>
        </div>

        <div class="d-flex gap-3 mt-4">
            <button type="submit" class="btn-simpan"><i class="bi bi-check-lg me-1"></i> Simpan Perubahan</button>
            <a href="{{ route('admin.edukasi.index') }}" class="btn-batal">Batal</a>
        </div>
    </div>
</form>

@push('scripts')
<script>
document.getElementById('gambarInput').addEventListener('change', function(e) {
    const file = e.target.files[0];
    const preview = document.getElementById('gambarPreview');
    const current = document.getElementById('currentImage');
    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.style.display = 'block';
        if (current) current.style.display = 'none';
    } else {
        preview.style.display = 'none';
        if (current) current.style.display = 'block';
    }
});
</script>
@endpush

@endsection
