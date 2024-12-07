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
        Schema::create('pengajuan_cetak_ktp', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('provinsi')->nullable();
            $table->integer('kabkota')->nullable();
            $table->integer('kecamatan')->nullable();
            $table->integer('kelurahan')->nullable();
            $table->unsignedBigInteger('pengajuan_id')->nullable()->index('fk_pengajuan_cetak_ktp_pengajuan');
            $table->string('nik_pengajuan', 16)->nullable();
            $table->string('nama_lengkap_pengajuan')->nullable();
            $table->string('alasan_pengajuan')->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_cetak_ktp');
    }
};
