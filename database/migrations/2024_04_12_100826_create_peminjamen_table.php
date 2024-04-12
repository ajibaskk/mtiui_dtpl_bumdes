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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nasabah_id');
            $table->string('nama_usaha');
            $table->string('jenis_usaha');
            $table->string('deskripsi_usaha');
            $table->integer('jumlah_pinjaman');
            $table->integer('tenor');
            $table->integer('bunga');
            $table->integer('total_pinjaman');
            $table->integer('angsuran');
            $table->timestamps();
            
            $table->foreign('nasabah_id')->references('nasabah_id')->on('nasabah');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
