<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Berita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('beritas',function(Blueprint $table){
            $table->increments('id');
            $table->string('gambar_berita');
            $table->string('judul_berita',200);
            $table->text('isi');
            $table->string('link')->nullable();
            $table->date('tanggal_berita');
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
    }
}
