<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PesananKorus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanan_koruses', function (Blueprint $table) {
            $table->id();
            $table->string('id_korus');
            $table->string('pesanan');
            $table->string('list_id_pesanan_anggota');
            $table->integer('status_pesanan');
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
        Schema::dropIfExists('pesanan_koruses');
    }
}
