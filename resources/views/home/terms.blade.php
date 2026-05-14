@extends('layouts.guest')
@section('title', 'Syarat & Ketentuan - PawRise')
@section('content')
<section class="py-5 bg-white">
    <div class="container" style="max-width: 800px;">
        <h1 class="fw-bold mb-4">Syarat & Ketentuan</h1>
        <p class="text-muted">Terakhir diperbarui: {{ date('d M Y') }}</p>
        
        <div class="mt-4">
            <h4 class="fw-bold mt-4">1. Penerimaan Syarat</h4>
            <p>Dengan mengakses situs web PawRise, Anda setuju untuk terikat oleh Syarat dan Ketentuan Penggunaan ini, semua hukum dan peraturan yang berlaku, dan setuju bahwa Anda bertanggung jawab untuk mematuhi hukum setempat yang berlaku.</p>

            <h4 class="fw-bold mt-4">2. Proses Adopsi</h4>
            <p>PawRise adalah platform yang menghubungkan calon pengadopsi dengan shelter. Keputusan akhir mengenai persetujuan adopsi sepenuhnya berada di tangan masing-masing shelter.</p>

            <h4 class="fw-bold mt-4">3. Tanggung Jawab Pengadopsi</h4>
            <p>Sebagai pengadopsi, Anda setuju untuk memberikan perawatan, makanan, tempat tinggal, dan kasih sayang yang layak bagi hewan peliharaan yang diadopsi. Anda juga setuju untuk tidak menelantarkan hewan tersebut.</p>

            <h4 class="fw-bold mt-4">4. Batasan Tanggung Jawab</h4>
            <p>PawRise tidak bertanggung jawab atas tindakan, perilaku, atau kondisi kesehatan hewan setelah proses adopsi selesai.</p>
        </div>
    </div>
</section>
@endsection
