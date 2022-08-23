<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembiayaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembiayaans', function (Blueprint $table) {
            $table->bigIncrements('id_pembiayaan');
            $table->unsignedBigInteger('id_nasabah');
            $table->bigInteger('nomor_pembiayaan');
            $table->bigInteger('nilai_pembiayaan');
            $table->bigInteger('jumlah_angsuran');
            $table->bigInteger('margin_keuntungan');
            $table->bigInteger('total_pembiayaan');
            $table->date('jatuh_tempo');
            $table->timestamps();
          
            $table->foreign('id_nasabah')->references('id_nasabah')->on('nasabahs')
                                                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pembiayaans');
    }
}
