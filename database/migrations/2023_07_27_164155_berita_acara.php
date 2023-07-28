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
        Schema::create('berita_acara', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nama_lsp');
            $table->string('alamat');
            $table->string('tempat_uji');
            $table->integer('jumlah_asesi');
            $table->string('kompeten');
            $table->string('belum_kompeten');
            $table->string('nama_asesor');
            $table->string('tanggal');
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
