<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Umkmdefault extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('umkms', function (Blueprint $table) {
            
            $table->boolean('iumk')->default(0)->change();
            $table->boolean('sku')->default(0)->change();
            $table->boolean('izin_usaha_industri')->default(0)->change();
            $table->boolean('surat_ijin')->default(0)->change();
            $table->boolean('npwp_pemilik')->default(0)->change();
            $table->boolean('npwp_bu')->default(0)->change();
            $table->boolean('sk_usaha')->default(0)->change();
            $table->boolean('tdup')->default(0)->change();
            $table->boolean('akta_usaha')->default(0)->change();
            $table->boolean('imb')->default(0)->change();
            $table->boolean('tanpaberkas')->default(0)->change();
            $table->boolean('pirt')->default(0)->change();
            $table->boolean('sh')->default(0)->change();
            $table->boolean('sni')->default(0)->change();
            $table->boolean('izin_alat_kesehatan')->default(0)->change();
            $table->boolean('pkrt')->default(0)->change();
            $table->boolean('iso')->default(0)->change();
            $table->boolean('keamanan')->default(0)->change();
            $table->boolean('halal')->default(0)->change();
            $table->boolean('bpom')->default(0)->change();
            $table->boolean('sertifikat_khusus_pangan')->default(0)->change();
            $table->boolean('sertifikat_non_pangan')->default(0)->change();
            $table->boolean('tanpa_sertifikat')->default(0)->change();
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
