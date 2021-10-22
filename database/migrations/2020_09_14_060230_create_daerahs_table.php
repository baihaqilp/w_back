<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaerahsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('provinsis', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_provinsi');
            $table->string('provinsi',30);
            $table->timestamps();
        });
        
        Schema::create('kotas',function(Blueprint $table){
            $table->id();
            $table->integer('kode_kota');
            $table->integer('kode_provinsi');
            $table->string('kota',30);
            $table->timestamps();
        });
        Schema::create('kecamatans',function(Blueprint $table){
            $table->id();
            $table->integer('kode_kota');
            $table->integer('kode_kecamatan');
            $table->string('kecamatan',30);
            $table->timestamps();
        });
        Schema::create('desas',function(Blueprint $table){
            $table->id();
            $table->integer('kode_kecamatan');
            $table->integer('kode_desa');
            $table->string('desa',30);
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
        Schema::dropIfExists('daerahs');
    }
}
