<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE media MODIFY COLUMN section ENUM('features','aktivitas','hero','story','other') NOT NULL DEFAULT 'other'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE media MODIFY COLUMN section ENUM('features','aktivitas','other') NOT NULL DEFAULT 'other'");
    }
};
