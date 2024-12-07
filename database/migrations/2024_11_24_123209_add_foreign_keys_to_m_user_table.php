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
        Schema::table('m_user', function (Blueprint $table) {
            $table->foreign(['kategori_user_id'], 'FK_m_user_kategori')->references(['id_kategori_user'])->on('m_kategori_user')->onUpdate('cascade')->onDelete('set null');
            $table->foreign(['role_id'], 'FK_m_user_role')->references(['id_role'])->on('m_role')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_user', function (Blueprint $table) {
            $table->dropForeign('FK_m_user_kategori');
            $table->dropForeign('FK_m_user_role');
        });
    }
};
