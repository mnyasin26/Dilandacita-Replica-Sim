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
        Schema::create('m_layanan', function (Blueprint $table) {
            $table->bigIncrements('id_layanan');
            $table->string('nama_layanan', 100)->nullable();
            $table->string('path', 100)->nullable();
            $table->string('url', 100)->nullable();
            $table->text('keterangan')->nullable();
            $table->integer('is_active')->nullable();
            $table->integer('limit')->nullable();
            $table->integer('is_active_limit_fo')->nullable();
            $table->integer('limit_fo')->nullable();
            $table->string('redirect')->nullable();
            $table->smallInteger('status_redirect')->nullable();
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_layanan');
    }
};
