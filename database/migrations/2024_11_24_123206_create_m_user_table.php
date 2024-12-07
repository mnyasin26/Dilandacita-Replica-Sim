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
        Schema::create('m_user', function (Blueprint $table) {
            $table->bigIncrements('id_user');
            $table->string('nik', 20)->nullable();
            $table->string('no_kk', 20)->nullable();
            $table->string('telepon', 20)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('siak_user')->nullable();
            $table->string('email', 100)->nullable()->unique('email');
            $table->string('password', 100)->nullable();
            $table->string('pic')->nullable();
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->string('verification_code')->nullable();
            $table->tinyInteger('is_email_verified')->nullable();
            $table->integer('no_kec')->nullable();
            $table->integer('no_kel')->nullable();
            $table->unsignedBigInteger('role_id')->index('fk_m_user_role');
            $table->unsignedBigInteger('kategori_user_id')->nullable()->index('fk_m_user_kategori');
            $table->string('layanan_id', 50)->nullable();
            $table->integer('is_helpdesk')->nullable();
            $table->integer('is_semeru')->nullable();
            $table->integer('is_ketua_rw')->nullable();
            $table->dateTime('created_at')->nullable()->useCurrent();
            $table->dateTime('updated_at')->useCurrentOnUpdate()->nullable()->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
    }
};
