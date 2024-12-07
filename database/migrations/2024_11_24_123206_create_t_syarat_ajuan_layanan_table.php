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
        Schema::create('t_syarat_ajuan_layanan', function (Blueprint $table) {
            $table->bigIncrements('id_syarat_ajuan_layan');
            $table->unsignedBigInteger('pengajuan_id')->nullable()->index('fk_t_syarat_ajuan_layanan_pengajuan');
            $table->string('nik', 20)->nullable();
            $table->string('img_1')->nullable();
            $table->string('img_thumb_1')->nullable();
            $table->string('img_2')->nullable();
            $table->string('img_thumb_2')->nullable();
            $table->string('img_3')->nullable();
            $table->string('img_thumb_3')->nullable();
            $table->string('img_4')->nullable();
            $table->string('img_thumb_4')->nullable();
            $table->string('img_5')->nullable();
            $table->string('img_thumb_5')->nullable();
            $table->string('img_6')->nullable();
            $table->string('img_thumb_6')->nullable();
            $table->string('img_7')->nullable();
            $table->string('img_thumb_7')->nullable();
            $table->string('img_8')->nullable();
            $table->string('img_thumb_8')->nullable();
            $table->string('img_9')->nullable();
            $table->string('img_thumb_9')->nullable();
            $table->string('img_10')->nullable();
            $table->string('img_thumb_10')->nullable();
            $table->string('img_11')->nullable();
            $table->string('img_thumb_11')->nullable();
            $table->string('img_12')->nullable();
            $table->string('img_thumb_12')->nullable();
            $table->string('img_13')->nullable();
            $table->string('img_thumb_13')->nullable();
            $table->string('img_14')->nullable();
            $table->string('img_thumb_14')->nullable();
            $table->string('img_15')->nullable();
            $table->string('img_thumb_15')->nullable();
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_syarat_ajuan_layanan');
    }
};
