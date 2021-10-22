<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class KategoriIndukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kategori_induk', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_induk');
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
        Schema::create('kategori_induk', function (Blueprint $table) {
            $table->id();
            $table->string('kategori_induk');
            $table->timestamps();
        });
    }
}
