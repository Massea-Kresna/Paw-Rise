<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adoption_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('animal_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('full_name');
            $table->string('whatsapp', 30);
            $table->string('email');
            $table->string('address', 500);
            $table->text('reason');
            $table->enum('experience', ['belum', 'pernah', 'sedang'])->default('belum');
            $table->boolean('agreement')->default(false);
            $table->enum('status', ['menunggu', 'disetujui', 'ditolak'])->default('menunggu');
            $table->text('shelter_note')->nullable();
            $table->timestamps();
            $table->index(['user_id', 'status']);
            $table->index(['animal_id', 'status']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('adoption_applications');
    }
};
