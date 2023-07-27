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
        Schema::create('persyaratan_pengalaman', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('no_reg_simpan');
            $table->string('paket_pekerjaan');
            $table->string('tgl_awal');
            $table->string('jabatan');
            $table->string('surat_referensi');
            $table->string('jenis_pengalaman');
            $table->string('lokasi_pekerjaan');
            $table->string('tgl_akhir');
            $table->string('nilai_proyek');
            $table->string('pengguna_jasa');
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
