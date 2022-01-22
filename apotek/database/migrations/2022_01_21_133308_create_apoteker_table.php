<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApotekerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apoteker', function (Blueprint $table) {
            $table->string('kodeApoteker', 50);
            $table->string('namaApoteker', 50);
            $table->date('tanggalLahir');
            $table->primary('kodeApoteker');
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
        Schema::dropIfExists('apoteker');
    }
}
