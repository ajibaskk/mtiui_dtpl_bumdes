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
        Schema::create('nasabah', function (Blueprint $table) {
            $table->id("nasabah_id");
            $table->string("nik");
            $table->string("nama_lengkap");
            $table->string("alamat_lengkap");
            $table->string("tempat_lahir");
            $table->date("tanggal_lahir");
            $table->string("jenis_kelamin");
            $table->string("jenis_pekerjaan");
            $table->string("rentang_penghasilan");
            $table->string("pendidikan_terakhir");
            $table->string("file_ktp_location");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nasabah');
    }
};
