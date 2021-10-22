<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnKomisiFinalPesanans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('pesanans', function (Blueprint $table) {
            
            $table->double('komisi_korus_final',8,2)->nullable();
            $table->double('komisi_rantus_final',8,2)->nullable();
            
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
        Schema::table('pesanans', function (Blueprint $table) {
            
            $table->dropColumn(['komisi_korus_final','komisi_rantus_final']);
            
        });
    }
}
