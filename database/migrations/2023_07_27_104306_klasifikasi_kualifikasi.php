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
        Schema::create('klasifikasi_kualifikasi', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('jabatan_kerja');
            $table->string('invoice');
            $table->string('klasifikasi');
            $table->string('kualifikasi');
            $table->string('asosiasi');
            $table->string('jenis_permohonan');
            $table->string('tuk');
            $table->string('lsp');
            $table->string('sub_klasifikasi');
            $table->integer('jenjang');
            $table->string('no_reg_keanggotaan_profesi');
            $table->string('sertifikat_skk');
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
