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
        Schema::table('t_pengajuan', function (Blueprint $table) {
            $table->foreign(['cetak_biodata_by'], 'FK_t_pengajuan_cetak_biodata_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['claim_done_by'], 'FK_t_pengajuan_claim_done_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['claim_reject_by'], 'FK_t_pengajuan_claim_reject_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['created_by'], 'FK_t_pengajuan_created_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['done_by'], 'FK_t_pengajuan_done_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['grab_by'], 'FK_t_pengajuan_grab_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['id_petugas'], 'FK_t_pengajuan_id_petugas')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['layanan_id'], 'FK_t_pengajuan_layanan_id')->references(['id_layanan'])->on('m_layanan')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['menunggu_by'], 'FK_t_pengajuan_menunggu_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['process_by'], 'FK_t_pengajuan_process_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['rejected_by'], 'FK_t_pengajuan_rejected_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['repaired_by'], 'FK_t_pengajuan_repaired_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['verified_by'], 'FK_t_pengajuan_verified_by')->references(['id_user'])->on('m_user')->onUpdate('cascade')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_pengajuan', function (Blueprint $table) {
            $table->dropForeign('FK_t_pengajuan_cetak_biodata_by');
            $table->dropForeign('FK_t_pengajuan_claim_done_by');
            $table->dropForeign('FK_t_pengajuan_claim_reject_by');
            $table->dropForeign('FK_t_pengajuan_created_by');
            $table->dropForeign('FK_t_pengajuan_done_by');
            $table->dropForeign('FK_t_pengajuan_grab_by');
            $table->dropForeign('FK_t_pengajuan_id_petugas');
            $table->dropForeign('FK_t_pengajuan_layanan_id');
            $table->dropForeign('FK_t_pengajuan_menunggu_by');
            $table->dropForeign('FK_t_pengajuan_process_by');
            $table->dropForeign('FK_t_pengajuan_rejected_by');
            $table->dropForeign('FK_t_pengajuan_repaired_by');
            $table->dropForeign('FK_t_pengajuan_verified_by');
        });
    }
};
