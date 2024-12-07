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
        Schema::table('pengajuan_akta_kelahiran', function (Blueprint $table) {
            $table->foreign(['pengajuan_id'], 'FK_Pengajuan_Akta_Kelahiran_pengajuan')->references(['id_pengajuan'])->on('t_pengajuan')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pengajuan_akta_kelahiran', function (Blueprint $table) {
            $table->dropForeign('FK_Pengajuan_Akta_Kelahiran_pengajuan');
        });
    }
};
