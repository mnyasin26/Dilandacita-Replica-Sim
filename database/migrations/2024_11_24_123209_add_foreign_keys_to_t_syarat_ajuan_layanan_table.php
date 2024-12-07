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
        Schema::table('t_syarat_ajuan_layanan', function (Blueprint $table) {
            $table->foreign(['pengajuan_id'], 'FK_t_syarat_ajuan_layanan_pengajuan')->references(['id_pengajuan'])->on('t_pengajuan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('t_syarat_ajuan_layanan', function (Blueprint $table) {
            $table->dropForeign('FK_t_syarat_ajuan_layanan_pengajuan');
        });
    }
};
