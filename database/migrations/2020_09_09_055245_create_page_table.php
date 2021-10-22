<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
              
        Schema::create('promos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('kode_promo',200);
            $table->string('deskripsi',100);
            $table->timestamps();
        });
        Schema::create('ongkirs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('id_daerah',20);
            $table->string('nama_daerah',100);
            $table->string('gudang',100);
            $table->decimal('jarak/km');
            $table->integer('biaya_km');
            $table->integer('km_berikutnya');
            $table->decimal('ongkos_penerima');
            $table->decimal('ongkos_gudang');
            $table->decimal('total_ongkos');
            $table->integer('pembulatan');
            $table->timestamps();
        });

        Schema::create('banners',function(Blueprint $table){
            $table->increments('id');
            $table->string('banner',200);
            $table->integer('tampil');
            $table->timestamps();
        });
        /*Schema::create('beritas',function(Blueprint $table){
            $table->increments('id');
            $table->string('gambar_berita');
            $table->string('judul_berita',200);
            $table->text('isi');
            $table->string('link');
            $table->date('tanggal_berita');
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::dropIfExists('pesanan_produk');
        Schema::dropIfExists('promo');
    }
}
