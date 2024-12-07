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
        Schema::create('pengajuan_akta_kelahiran', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pengajuan_id')->nullable()->index('fk_pengajuan_akta_kelahiran_pengajuan');
            $table->integer('provinsi')->nullable();
            $table->integer('kabkota')->nullable();
            $table->integer('kecamatan')->nullable();
            $table->integer('kelurahan')->nullable();
            $table->string('nik_saksi_1', 16)->nullable();
            $table->string('nama_lgkp_saksi_1', 191)->nullable();
            $table->string('no_kk_saksi_1', 16)->nullable();
            $table->string('kwrngrn_saksi_1', 5)->nullable();
            $table->string('nik_saksi_2', 16)->nullable();
            $table->string('nama_lgkp_saksi_2', 191)->nullable();
            $table->string('no_kk_saksi_2', 16)->nullable();
            $table->string('kwrngrn_saksi_2', 5)->nullable();
            $table->string('nik_ayah', 16)->nullable();
            $table->string('nama_lgkp_ayah', 191)->nullable();
            $table->string('tmpt_lhr_ayah', 191)->nullable();
            $table->date('tgl_lhr_ayah')->nullable();
            $table->integer('kwrngrn_ayah')->nullable();
            $table->string('nik_ibu', 16)->nullable();
            $table->string('nama_lgkp_ibu', 191)->nullable();
            $table->string('tmpt_lhr_ibu', 191)->nullable();
            $table->date('tgl_lhr_ibu')->nullable();
            $table->integer('kwrngrn_ibu')->nullable();
            $table->string('nik_anak', 16)->nullable();
            $table->string('nama_lgkp_anak', 191)->nullable();
            $table->string('tempat_dilahirkan_anak', 191)->nullable();
            $table->string('tempat_kelahirkan_anak', 191)->nullable();
            $table->date('tgl_kelahiran_anak')->nullable();
            $table->integer('jenis_kelamin_anak')->nullable();
            $table->integer('hari')->nullable();
            $table->time('waktu_kelahiran')->nullable();
            $table->integer('jenis_kelahiran')->nullable();
            $table->integer('kelahiran_ke')->nullable();
            $table->integer('penolong_klhrn')->nullable();
            $table->string('berat_anak', 10)->nullable();
            $table->string('panjang_anak', 10)->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengajuan_akta_kelahiran');
    }
};
