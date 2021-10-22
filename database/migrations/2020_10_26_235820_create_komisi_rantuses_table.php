<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKomisiRantusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komisi_rantuses', function (Blueprint $table) {
            $table->id();
            $table->string('id_rantus');
            $table->string('nama_rantus');
            $table->string('no_pesanan');
            $table->date('tanggal_pesanan');
            $table->double('komisi_pesanan',8,2);
            $table->boolean('is_bayar')->default(0);
            $table->date('tanggal_terbayar')->nullable();;
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
        Schema::dropIfExists('komisi_rantuses');
    }
}
