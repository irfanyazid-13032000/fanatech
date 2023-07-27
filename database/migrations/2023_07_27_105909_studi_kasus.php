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
        Schema::create('studi_kasus', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('judul');
            $table->string('tgl_selesai');
            $table->string('file_studi_kasus');
            $table->string('tgl_mulai');
            $table->string('keterangan');
            $table->string('status');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
