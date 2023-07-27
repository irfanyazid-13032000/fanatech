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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('institusi');
            $table->string('jenjang');
            $table->string('negara');
            $table->string('kabupaten');
            $table->string('file_surat_ket_lulus');
            $table->string('program_studi');
            $table->string('tahun_lulus');
            $table->string('alamat');
            $table->string('provinsi');
            $table->string('file_ijazah');
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
