<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePemesananDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kode_pemesanan');
            $table->integer('kode_suplier');
            $table->integer('kode_produk');
            $table->integer('harga');
            $table->integer('qty');
            $table->integer('total');
            $table->date('tanggal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan_details');
    }
}
