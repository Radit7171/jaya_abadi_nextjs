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
        Schema::create('servis', function (Blueprint $table) {
            $table->id();
            $table->string('kode_servis')->unique();
            $table->foreignId('pelanggan_id')->constrained('pelanggans');
            $table->foreignId('user_id')->constrained('users');
            $table->string('keluhan');
            $table->enum('status', ['Menunggu', 'Dikerjakan', 'Selesai']);
            $table->date('tanggal_masuk');
            $table->date('tanggal_selesai')->nullable();
            $table->decimal('biaya_jaya', 15, 2)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servis');
    }
};
