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
        Schema::create('nota_pembayaran', function (Blueprint $table) {
            $table->id();
            $table->string('kode_nota');
            $table->foreignId('servis_id')->nullable()->constrained('servis');
            $table->foreignId('pelanggan_id')->constrained('pelanggans');
            $table->decimal('total_jasa', 15, 2);
            $table->decimal('total_sparepart', 15, 2);
            $table->decimal('grand_total', 15, 2);
            $table->date('tanggal_bayar');
            $table->enum('status_bayar', ['belum', 'sudah'])->default('belum');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota_pembayaran');
    }
};
