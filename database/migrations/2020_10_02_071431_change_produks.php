<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeProduks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::table('produks', function (Blueprint $table) {
            $table->integer('overhead')->change();
            $table->integer('total_cogs')->change();
            $table->integer('cogs_satuan')->change();
            $table->integer('harga_jual_1')->change();
            $table->integer('harga_jual_final')->change();
        });
    }
}
