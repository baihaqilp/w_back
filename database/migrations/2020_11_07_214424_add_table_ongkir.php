<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTableOngkir extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('ongkirs', function (Blueprint $table) {

            $table->integer('biaya_km')->nullable();
            $table->integer('km_berikutnya')->nullable();
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
        Schema::table('ongkirs', function (Blueprint $table) {
            $table->integer('biaya_km')->nullable();
            $table->integer('km_berikutnya')->nullable();
        });
    }
}
