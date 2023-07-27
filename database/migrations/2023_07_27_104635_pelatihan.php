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
        Schema::create('pelatihan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('penyelenggara');
            $table->string('tgl_awal');
            $table->string('jam_pembelajaran');
            $table->string('file_sertifikat');
            $table->string('nama_pelatihan_dan_sertifikat');
            $table->string('tgl_akhir');
            $table->string('jumlah_hari');
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
