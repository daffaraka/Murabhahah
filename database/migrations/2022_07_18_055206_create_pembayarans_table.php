<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id_pembayaran');
            $table->unsignedBigInteger('id_pembiayaan');
            $table->string('nama_penyetor');
            $table->integer('angsuran_ke');
            $table->string('angsuran_bulan');
            $table->bigInteger('jumlah_bayar');
            $table->date('tanggal_bayar');

            $table->foreign('id_pembiayaan')->references('id_pembiayaan')->on('pembiayaans')
            ->onUpdate('cascade')->onDelete('cascade');

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
        Schema::dropIfExists('pembayarans');
    }
}
