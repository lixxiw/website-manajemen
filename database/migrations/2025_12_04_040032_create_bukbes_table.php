<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('bukbes', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT
            $table->date('tanggal');
            $table->integer('id_coa');
            $table->bigInteger('saldo_awal')->nullable();
            $table->bigInteger('debit')->nullable();
            $table->bigInteger('kredit')->nullable();
            $table->bigInteger('saldo_akhir')->nullable();
            $table->integer('deleted')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukbes');
    }
};
