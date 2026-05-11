<?php

\App\Models\KontenEdukasi::firstOrCreate(
    ['slug' => 'panduan-hari-pertama-sambut-anggota-keluarga-baru'],
    [
        'admin_id' => 1,
        'judul' => 'Panduan Hari Pertama: Sambut Anggota Keluarga Baru',
        'ringkasan' => 'Membawa pulang hewan peliharaan baru adalah momen mendebarkan. Inilah yang perlu Anda siapkan agar mereka merasa aman dan nyaman.',
        'konten' => 'Konten lengkap tentang panduan hari pertama...',
        'kategori' => 'gaya_hidup',
        'estimasi_baca' => 5,
        'is_published' => true,
        'published_at' => now(),
    ]
);

\App\Models\KontenEdukasi::firstOrCreate(
    ['slug' => 'nutrisi-seimbang-apa-yang-sebenarnya-mereka-butuhkan'],
    [
        'admin_id' => 1,
        'judul' => 'Nutrisi Seimbang: Apa yang Sebenarnya Mereka Butuhkan?',
        'ringkasan' => 'Pahami kebutuhan nutrisi spesifik berdasarkan usia dan jenis hewan untuk kesehatan jangka panjang yang optimal.',
        'konten' => 'Konten lengkap tentang nutrisi...',
        'kategori' => 'nutrisi',
        'estimasi_baca' => 8,
        'is_published' => true,
        'published_at' => now(),
    ]
);

\App\Models\KontenEdukasi::firstOrCreate(
    ['slug' => 'mengenal-tanda-tanda-hewan-sakit'],
    [
        'admin_id' => 1,
        'judul' => 'Mengenal Tanda-tanda Hewan Sakit',
        'ringkasan' => 'Deteksi dini dapat menyelamatkan nyawa. Kenali perubahan perilaku dan fisik yang memerlukan perhatian medis segera.',
        'konten' => 'Konten lengkap tentang tanda hewan sakit...',
        'kategori' => 'kesehatan',
        'estimasi_baca' => 6,
        'is_published' => true,
        'published_at' => now(),
    ]
);
echo "Seeding successful.\n";
