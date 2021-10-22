<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Produks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::dropIfExists('produks');
        Schema::create('produks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_kategori');
            $table->string('nama_produk',100);
            $table->string('deskripsi',200);
            $table->string('alamat',200);
            $table->string('kemasan',200);
            $table->integer('biaya_kirim');
            $table->string('image');
            $table->integer('kuantitas_beli');
            $table->integer('harga_pabrik');
            $table->integer('biaya_kirim_gudang_utama');
            $table->integer('biaya_kirim_gudang_kec');
            $table->integer('biaya_bongkar_pabrik');
            $table->integer('biaya_bongkar_gudang');
            $table->float('overhead');
            $table->float('total_cogs');
            $table->float('cogs_satuan');
            $table->integer('margin');
            $table->float('harga_jual_1');
            $table->integer('pajak');
            $table->float('harga_jual_final');
            $table->boolean('umkm');
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
        //
        Schema::dropIfExists('produks');
    }
}
