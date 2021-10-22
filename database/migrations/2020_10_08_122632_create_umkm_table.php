<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUmkmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('umkms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_usaha',200);
            $table->string('bentuk_usaha',200);
            $table->integer('tahun_usaha');
            $table->integer('omset');
            $table->string('bidang_usaha',200);
            $table->string('no_telp_usaha',20);
            $table->string('jenis_produk',200);
            $table->string('foto_produk',200);
            $table->text('bahan_baku');
            $table->text('kebutuhan_bahan');
            $table->string('nama_merk',200);
            $table->text('deskripsi_produk');
            $table->string('variasi_produk',200);
            $table->text('deskripsi_usaha');
            $table->integer('karyawan_tetap_pria')->nullable();
            $table->integer('karyawan_tidak_tetap_pria')->nullable();
            $table->integer('karyawan_tetap_wanita')->nullable();
            $table->integer('karyawan_tidak_tetap_wanita')->nullable();
            $table->string('nama_pengurus',200);
            $table->string('kontak',30);
            $table->string('jabatan',200);
            $table->string('no_ktp_pj',50);
            $table->string('nama_lengkap',200);
            $table->string('email',200);
            $table->text('alamat');
            $table->string('provinsi',200);
            $table->string('kota',200);
            $table->string('desa',200);
            $table->string('kodepos',10)->nullable();
            $table->string('no_telp_rumah',30)->nullable();
            $table->string('no_hp',30);
            $table->string('foto_ktp',100);
            $table->string('foto_pj',100);
            $table->string('alamat_usaha_utama',200);
            $table->string('provinsi_usaha',200);
            $table->string('kota_usaha',200);
            $table->string('alamat_usaha_lain',200)->nullable();
            $table->text('alamat_usaha_lain2')->nullable();
            $table->boolean('iumk')->nullable();
            $table->boolean('sku')->nullable();
            $table->boolean('izin_usaha_industri')->nullable();
            $table->boolean('surat_ijin')->nullable();
            $table->boolean('npwp_pemilik')->nullable();
            $table->boolean('npwp_bu')->nullable();
            $table->boolean('sk_usaha')->nullable();
            $table->boolean('tdup')->nullable();
            $table->boolean('akta_usaha')->nullable();
            $table->boolean('imb')->nullable();
            $table->boolean('tanpaberkas')->nullable();
            $table->string('foto_iumk',200)->nullable();
            $table->string('foto_sku',200)->nullable();
            $table->string('foto_izin_usaha_industri',200)->nullable();
            $table->string('foto_surat_ijin',200)->nullable();
            $table->string('foto_npwp_pemilik',200)->nullable();
            $table->string('foto_npwp_bu',200)->nullable();
            $table->string('foto_sk_usaha',200)->nullable();
            $table->string('foto_tdup',200)->nullable();
            $table->string('foto_akta_usaha',200)->nullable();
            $table->string('foto_imb',200)->nullable();
            $table->boolean('pirt')->nullable();
            $table->boolean('sh')->nullable();
            $table->boolean('sni')->nullable();
            $table->boolean('izin_alat_kesehatan')->nullable();
            $table->boolean('pkrt')->nullable();
            $table->boolean('iso')->nullable();
            $table->boolean('keamanan')->nullable();
            $table->boolean('halal')->nullable();
            $table->boolean('bpom')->nullable();
            $table->boolean('sertifikat_khusus_pangan')->nullable();
            $table->boolean('sertifikat_non_pangan')->nullable();
            $table->boolean('tanpa_sertifikat')->nullable();
            $table->string('foto_pirt',200)->nullable();
            $table->string('foto_sh',200)->nullable();
            $table->string('foto_sni',200)->nullable();
            $table->string('foto_izin_alat_kesehatan',200)->nullable();
            $table->string('foto_pkrt',200)->nullable();
            $table->string('foto_iso',200)->nullable();
            $table->string('foto_keamanan',200)->nullable();
            $table->string('foto_halal',200)->nullable();
            $table->string('foto_bpom',200)->nullable();
            $table->string('foto_sertifikat_khusus_pangan',200)->nullable();
            $table->string('foto_sertifikat_non_pangan',200)->nullable();
            $table->string('website',200)->nullable();
            $table->string('link_sosmed',200)->nullable();
            $table->string('sosmed',200)->nullable();
            $table->string('link_marketplace',200)->nullable();
            $table->string('marketplace',200)->nullable();
            $table->string('nama_mentor',200)->nullable();
            $table->string('kontak_mentor',200)->nullable();
            $table->string('jenis_kontak_mentor',200)->nullable();
            $table->string('asosiasi_komunitas',200)->nullable();
            $table->string('nama_organisasi',200)->nullable();
    
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
        Schema::dropIfExists('umkms');
    }
}
