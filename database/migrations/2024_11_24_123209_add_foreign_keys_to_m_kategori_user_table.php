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
        Schema::table('m_kategori_user', function (Blueprint $table) {
            $table->foreign(['role_id'], 'FK_m_kategori_user_role')->references(['id_role'])->on('m_role')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('m_kategori_user', function (Blueprint $table) {
            $table->dropForeign('FK_m_kategori_user_role');
        });
    }
};
