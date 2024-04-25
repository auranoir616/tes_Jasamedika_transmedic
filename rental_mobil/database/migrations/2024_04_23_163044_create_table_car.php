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
        Schema::create('table_car', function (Blueprint $table) {
            $table->id('id_car');
            $table->string('model');
            $table->string('merek');
            $table->string('transmisi');
            $table->string('jenis');
            $table->string('tahun');
            $table->string('bahan_bakar');
            $table->string('no_plat');
            $table->string('foto');
            $table->integer('tarif');
            $table->integer('tersedia')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_car');
    }
};
