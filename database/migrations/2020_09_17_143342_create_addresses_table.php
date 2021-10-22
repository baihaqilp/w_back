<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('penerima');
            $table->integer('provinsi');
            $table->integer('kota');
            $table->integer('kecamatan');
            $table->integer('desa');
            $table->string('alamat_lengkap');
            $table->string('rt_rw');
            $table->string('kode_pos');
            $table->string('lat');
            $table->string('lng');
            $table->boolean('is_main_address')->default(false);
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
        Schema::dropIfExists('addresses');
    }
}
