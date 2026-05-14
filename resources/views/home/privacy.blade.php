@extends('layouts.guest')
@section('title', 'Kebijakan Privasi - PawRise')
@section('content')
<section class="py-5 bg-white">
    <div class="container" style="max-width: 800px;">
        <h1 class="fw-bold mb-4">Kebijakan Privasi</h1>
        <p class="text-muted">Terakhir diperbarui: {{ date('d M Y') }}</p>
        
        <div class="mt-4">
            <h4 class="fw-bold mt-4">1. Pengumpulan Informasi</h4>
            <p>Kami mengumpulkan informasi dari Anda ketika Anda mendaftar di situs kami, masuk ke akun Anda, melakukan adopsi, atau keluar. Informasi yang dikumpulkan mencakup nama, alamat email, nomor telepon, dan data lain yang relevan dengan proses adopsi.</p>

            <h4 class="fw-bold mt-4">2. Penggunaan Informasi</h4>
            <p>Informasi yang kami kumpulkan dari Anda dapat digunakan untuk:</p>
            <ul>
                <li>Personalisasi pengalaman Anda dan memenuhi kebutuhan pribadi Anda</li>
                <li>Menyediakan konten edukasi yang relevan</li>
                <li>Meningkatkan situs web kami</li>
                <li>Menghubungi Anda melalui email atau telepon terkait proses adopsi</li>
            </ul>

            <h4 class="fw-bold mt-4">3. Keamanan Data</h4>
            <p>Kami menerapkan berbagai langkah keamanan untuk menjaga keamanan informasi pribadi Anda. Kami menggunakan enkripsi canggih untuk melindungi informasi sensitif yang dikirimkan secara online.</p>
        </div>
    </div>
</section>
@endsection
