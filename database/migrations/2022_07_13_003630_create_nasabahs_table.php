<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNasabahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nasabahs', function (Blueprint $table) {
            $table->bigIncrements('id_nasabah');
            $table->string('nama');
            $table->bigInteger('noIdentitas');
            $table->string('TTL');
            $table->string('jenisKelamin');
            $table->string('agama');
            $table->string('pekerjaan');
            $table->string('pendidikan');
            $table->bigInteger('noHp');
            $table->string('alamat');
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('provinsi');
            $table->unsignedBigInteger('id_user');

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
        Schema::dropIfExists('nasabahs');
    }
}
