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
        Schema::create('asesi_lampiran', function (Blueprint $table) {
            $table->id();
            $table->string('no_surat');
            $table->string('nama_asesi');
            $table->string('skema');
            $table->string('jam');
            $table->string('ruang');
            $table->string('asesor');
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
