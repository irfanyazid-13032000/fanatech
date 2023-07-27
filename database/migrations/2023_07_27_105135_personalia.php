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
        Schema::create('personalia', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->string('email');
            $table->string('npwp');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('kodepos');
            $table->string('pas_foto');
            $table->string('nama');
            $table->string('tgl_lahir');
            $table->string('telepon');
            $table->string('jenis_kelamin');
            $table->string('kabupaten');
            $table->string('file_npwp');
            $table->string('ktp');
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
