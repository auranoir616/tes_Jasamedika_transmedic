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
        Schema::create('table_transaksi', function (Blueprint $table) {
            $table->id('id_transaksi');
            $table->bigInteger('id_car');
            $table->string('mulai_pinjam');
            $table->string('selesai_pinjam');
            $table->string('tarif_per_hari');
            $table->string('total_tarif');
            $table->bigInteger('id_owner');
            $table->bigInteger('id_user');
            $table->string('status');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaksi');
    }
};
