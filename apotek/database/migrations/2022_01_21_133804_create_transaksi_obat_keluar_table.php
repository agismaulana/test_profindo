<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiObatKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_obat_keluar', function (Blueprint $table) {
            $table->string('idTransaksi', 50);
            $table->string('kodeObat', 50);
            $table->integer('jumlahJual');
            $table->string('kodeApoteker', 50);
            $table->date('tanggalBeli');
            $table->primary('idTransaksi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksi_obat_keluar');
    }
}
