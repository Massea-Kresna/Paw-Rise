<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shelter_id')->constrained()->cascadeOnDelete();
            $table->string('code', 20)->nullable();
            $table->string('name');
            $table->enum('species', ['anjing', 'kucing', 'lainnya'])->default('anjing');
            $table->string('breed');
            $table->integer('age_months')->default(0);
            $table->decimal('weight_kg', 5, 2)->nullable();
            $table->enum('gender', ['jantan', 'betina'])->default('jantan');
            $table->enum('size', ['kecil', 'sedang', 'besar'])->default('sedang');
            $table->boolean('vaccinated')->default(false);
            $table->boolean('sterilized')->default(false);
            $table->enum('status', ['tersedia', 'diproses', 'diadopsi'])->default('tersedia');
            $table->text('description')->nullable();
            $table->string('characteristics', 500)->nullable();
            $table->text('medical_history')->nullable();
            $table->string('main_photo')->nullable();
            $table->timestamps();

            $table->index('status');
            $table->index('species');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
