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
        Schema::create('t_pengajuan', function (Blueprint $table) {
            $table->bigIncrements('id_pengajuan');
            $table->unsignedBigInteger('layanan_id')->nullable()->index('fk_t_pengajuan_layanan_id');
            $table->string('nik')->nullable();
            $table->string('nomor_kk')->nullable();
            $table->date('tgl_pengajuan')->nullable();
            $table->string('status_pengajuan')->nullable();
            $table->unsignedBigInteger('created_by')->nullable()->index('fk_t_pengajuan_created_by');
            $table->text('keterangan')->nullable();
            $table->string('nama_lgkp', 191)->nullable();
            $table->unsignedBigInteger('id_petugas')->nullable()->index('fk_t_pengajuan_id_petugas');
            $table->string('pin', 8)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('email', 200)->nullable();
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
            $table->unsignedBigInteger('verified_by')->nullable()->index('fk_t_pengajuan_verified_by');
            $table->dateTime('verified_timestamp')->nullable();
            $table->unsignedBigInteger('process_by')->nullable()->index('fk_t_pengajuan_process_by');
            $table->dateTime('process_timestamp')->nullable();
            $table->unsignedBigInteger('done_by')->nullable()->index('fk_t_pengajuan_done_by');
            $table->dateTime('done_timestamp')->nullable();
            $table->unsignedBigInteger('repaired_by')->nullable()->index('fk_t_pengajuan_repaired_by');
            $table->dateTime('repaired_timestamp')->nullable();
            $table->unsignedBigInteger('rejected_by')->nullable()->index('fk_t_pengajuan_rejected_by');
            $table->dateTime('rejected_timestamp')->nullable();
            $table->unsignedBigInteger('grab_by')->nullable()->index('fk_t_pengajuan_grab_by');
            $table->dateTime('grab_timestamp')->nullable();
            $table->unsignedBigInteger('cetak_biodata_by')->nullable()->index('fk_t_pengajuan_cetak_biodata_by');
            $table->dateTime('cetak_biodata_timestamp')->nullable();
            $table->unsignedBigInteger('menunggu_by')->nullable()->index('fk_t_pengajuan_menunggu_by');
            $table->dateTime('menunggu_timestamp')->nullable();
            $table->string('status_klaim', 25)->nullable();
            $table->dateTime('claim_timestamp')->nullable();
            $table->dateTime('claim_done_timestamp')->nullable();
            $table->string('claim_notes', 500)->nullable();
            $table->unsignedBigInteger('claim_done_by')->nullable()->index('fk_t_pengajuan_claim_done_by');
            $table->dateTime('claim_reject_timestamp')->nullable();
            $table->unsignedBigInteger('claim_reject_by')->nullable()->index('fk_t_pengajuan_claim_reject_by');
            $table->string('claim_reject_notes', 500)->nullable();
            $table->string('alasan_pengajuan')->nullable();
            $table->text('dokumen')->nullable();
            $table->unsignedBigInteger('layanan_id_parent')->nullable();
            $table->unsignedBigInteger('pengajuan_id_parent')->nullable();
            $table->string('nik_pemohon_lain')->nullable();
            $table->string('nama_pemohon_lain')->nullable();
            $table->text('dokumen_pemohon_lain')->nullable();
            $table->integer('is_surat_kuasa')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_pengajuan');
    }
};
