<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUmks extends Migration
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
            
            $table->boolean('iumk')->nullable()->change();
            $table->boolean('sku')->nullable()->change();
            $table->boolean('izin_usaha_industri')->nullable()->change();
            $table->boolean('surat_ijin')->nullable()->change();
            $table->boolean('npwp_pemilik')->nullable()->change();
            $table->boolean('npwp_bu')->nullable()->change();
            $table->boolean('sk_usaha')->nullable()->change();
            $table->boolean('tdup')->nullable()->change();
            $table->boolean('akta_usaha')->nullable()->change();
            $table->boolean('imb')->nullable()->change();
            $table->boolean('tanpaberkas')->nullable()->change();
            $table->boolean('pirt')->nullable()->change();
            $table->boolean('sh')->nullable()->change();
            $table->boolean('sni')->nullable()->change();
            $table->boolean('izin_alat_kesehatan')->nullable()->change();
            $table->boolean('pkrt')->nullable()->change();
            $table->boolean('iso')->nullable()->change();
            $table->boolean('keamanan')->nullable()->change();
            $table->boolean('halal')->nullable()->change();
            $table->boolean('bpom')->nullable()->change();
            $table->boolean('sertifikat_khusus_pangan')->nullable()->change();
            $table->boolean('sertifikat_non_pangan')->nullable()->change();
            $table->boolean('tanpa_sertifikat')->nullable()->change();
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
