<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Add 'admin' to role enum
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('adopter','shelter','admin') DEFAULT 'adopter'");

        // Add is_verified to shelters
        if (!Schema::hasColumn('shelters', 'is_verified')) {
            Schema::table('shelters', function (Blueprint $table) {
                $table->boolean('is_verified')->default(false)->after('description');
            });
        }
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('adopter','shelter') DEFAULT 'adopter'");

        if (Schema::hasColumn('shelters', 'is_verified')) {
            Schema::table('shelters', function (Blueprint $table) {
                $table->dropColumn('is_verified');
            });
        }
    }
};
