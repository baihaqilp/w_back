<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FileProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('file_products', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->string('file_name');
            $table->string('extention');
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
        Schema::table('file_products', function (Blueprint $table) {
            $table->id();
            $table->integer('id_product');
            $table->string('file_name');
            $table->string('extention');
            $table->timestamps();
        });
    }
}
