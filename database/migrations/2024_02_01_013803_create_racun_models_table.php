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
        Schema::create('racun_models', function (Blueprint $table) {
            $table->id('id_racun');
            $table->string('nama_racun');
            $table->string('harga_racun');
            $table->string('kode_racun');
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racun_models');
    }
};
