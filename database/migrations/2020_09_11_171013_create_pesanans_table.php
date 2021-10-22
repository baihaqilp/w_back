<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('no_pesanan');
            $table->integer('id_user');
            $table->date('tanggal_pesanan');
            $table->time('jam');
            $table->integer('alamat');
            $table->integer('id_produk');
            $table->float('harga_produk');
            $table->string('metode_pembayaran',100);
            $table->string('kode_promo');
            $table->string('detail_pembayaran')->default('belum dibayar');
            $table->integer('summary_pesanan');
            $table->float('summary_ongkir');
            $table->float('total_pembayaran');
            $table->float('komisi_korus');
            $table->float('komisi_rantus');
            $table->integer('status_pesanan')->default(0);
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
        Schema::dropIfExists('pesanans');
    }
}
