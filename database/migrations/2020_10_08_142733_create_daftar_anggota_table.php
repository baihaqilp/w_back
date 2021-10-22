<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarAnggotaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftaranggotas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_lengkap',200);
            $table->string('tempat_lahir',200);
            $table->date('tanggal_lahir');
            $table->string('no_ktp',30);
            $table->string('no_kk',30);
            $table->text('alamat');
            $table->string('jenis_kelamin',20);
            $table->string('no_hp',20);
            $table->string('foto_ktp',200);
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
        Schema::dropIfExists('daftaranggotas');
    }
}
