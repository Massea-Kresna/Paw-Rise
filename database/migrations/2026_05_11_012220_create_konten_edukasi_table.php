<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('konten_edukasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('admin_id')->constrained('users')->cascadeOnDelete();
            $table->string('judul');
            $table->string('slug')->unique();
            $table->text('ringkasan')->nullable();
            $table->longText('konten');
            $table->string('gambar')->nullable();
            $table->enum('kategori', ['kesehatan', 'pelatihan', 'nutrisi', 'gaya_hidup'])
                  ->default('kesehatan');
            $table->integer('estimasi_baca')->default(5); // menit
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_at')->nullable();
            $table->timestamps();

            $table->index(['kategori', 'is_published']);
            $table->index('slug');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('konten_edukasi');
    }
};