<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('servis', function (Blueprint $table) {
            $table->enum('status', ['Menunggu Antrean', 'Dicek', 'Menunggu Sparepart', 'Dikerjakan', 'Selesai'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servis', function (Blueprint $table) {
            $table->enum('status', ['Menunggu', 'Dikerjakan', 'Selesai'])->change();
        });
    }
};
