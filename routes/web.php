<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('pilih');
});
Route::get('/umkm')->name('umkm.show')->uses('Web\umkmController@input_umkm');
Route::get('/umkm_2')->name('umkm2.show')->uses('Web\umkmController@input_umkm2');
Route::get('/umkm_3')->name('umkm3.show')->uses('Web\umkmController@input_umkm3');
Route::get('/umkm_4')->name('umkm4.show')->uses('Web\umkmController@input_umkm4');
Route::get('/umkm_5')->name('umkm5.show')->uses('Web\umkmController@input_umkm5');
Route::get('/umkm_6')->name('umkm6.show')->uses('Web\umkmController@input_umkm6');
Route::get('/umkm_7')->name('umkm7.show')->uses('Web\umkmController@input_umkm7');
Route::post('/post_umkm')->name('umkm.input')->uses('Web\umkmController@post_umkm');
Route::post('/post_umkm2')->name('umkm2.input')->uses('Web\umkmController@post_umkm2');
Route::post('/post_umkm3')->name('umkm3.input')->uses('Web\umkmController@post_umkm3');
Route::post('/post_umkm4')->name('umkm4.input')->uses('Web\umkmController@post_umkm4');
Route::post('/post_umkm5')->name('umkm5.input')->uses('Web\umkmController@post_umkm5');
Route::post('/post_umkm6')->name('umkm6.input')->uses('Web\umkmController@post_umkm6');
Route::post('/post_umkm7')->name('umkm7.input')->uses('Web\umkmController@post_umkm7');
Route::get('/daftar_anggota')->name('daftar.anggota')->uses('Web\DaftarAnggotaController@index');
Route::post('/input_anggota')->name('input.anggota')->uses('Web\AnggotaController@input_anggota');
Route::post('/passwword/reset','ForgotPasswordController@reset')->name('password.ganti');
Route::get('/password.success', function () {
    return view('auth/passwords/email');
})->name('password.success');
Route::get('/desa/{kode_kecamatan}')->name('desa.id.kecamatan')->uses('Web\AnggotaController@get_desa');
Route::get('/kecamatan/{kode_kota}')->name('kecamatan.id.kota')->uses('Web\AnggotaController@get_kecamatan');

Route::get('/dashboard_chart')->name('dashboard.chart')->uses('Web\DashboardController@chart');
Route::get('/pesanan','Web\DashboardController@yolo');
//-------------------------------------------//
Route::get('/korus')->name('korus.show')->uses('Web\KorusWebController@index');
Route::get('/rantus')->name('rantus.show')->uses('Web\RantusWebController@index');
Route::prefix('/admin')->group(function() {
    Route::get('/login','Auth\LoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\LoginController@login')->name('admin.login.submit');
    Route::get('/logout', 'Auth\LoginController@logout')->name('admin.logout');
    
   Route::middleware('auth:admin')->group(function(){
        Route::get('/', 'Web\DashboardController@index')->name('admin.super_dashboard');
        Route::view('forgot_password', 'auth.reset_password')->name('password.reset');
        Route::get('/pesanan')->name('pesanan.eccommerce')->uses('Web\PesananEccoController@index');
        Route::get('/kategori')->name('kategori.eccommerce')->uses('Web\KategoriController@index');
        Route::get('/tambah_produk')->name('tambahproduk.eccomerce')->uses('Web\ProdukEccoController@form_produk');
        //ongkir
        Route::get('/view_ongkir')->name('tambah.ongkir')->uses('Web\OngkirController@view_ongkir');
        Route::get('/delete_ongkir/{id}')->name('ongkir.delete')->uses('Web\OngkirController@delete_ongkir');
        Route::post('/update_ongkir/{id}')->name('ongkir.input')->uses('Web\OngkirController@update_ongkir');
        Route::post('/input_ongkir')->name('ongkir.input')->uses('Web\OngkirController@input_ongkir');
        Route::get('/ongkir')->name('ongkir.eccommerce')->uses('Web\OngkirController@index');
        Route::get('/view_edit_ongkir/{id}')->name('ongkir.editview')->uses('Web\OngkirController@view_edit_ongkir');  
        // Anggota
        Route::get('/tambah_anggota')->name('tambah.anggota')->uses('Web\AnggotaController@view_tambah_anggota');
        Route::get('/anggota')->name('anggota.eccommerce')->uses('Web\AnggotaController@index');
        Route::get('/anggota/detail/{id}')->name('anggota.detail')->uses('Web\AnggotaController@getProfileAnggota');
        Route::post('/anggota/korus/angkat/{id}')->name('anggota.angkat_korus')->uses('Web\AnggotaController@angkat_korus');
        Route::get('/anggota/korus/hapus/{id}')->name('anggota.hapus_korus')->uses('Web\AnggotaController@hapus_korus');
        Route::post('/anggota/rantus/angkat/{id}')->name('anggota.angkat_rantus')->uses('Web\AnggotaController@angkat_rantus');
        Route::get('/anggota/rantus/hapus/{id}')->name('anggota.hapus_rantus')->uses('Web\AnggotaController@hapus_rantus');
        Route::get('/anggota/korus/{id}')->name('anggota.show.angkat_korus')->uses('Web\AnggotaController@angkat_korusView');
        Route::get('/anggota/rantus/{id}')->name('anggota.show.angkat_korus')->uses('Web\AnggotaController@angkat_rantusView');

        
        Route::get('/beranda')->name('beranda.eccomerce')->uses('Web\DashboardController@index');
        
        // produk
        Route::get('/produk')->name('produk.eccommerce')->uses('Web\ProdukEccoController@index');
        Route::get('/view_tambah_gambar_produk/{id}')->name('produk.gambar')->uses('Web\ProdukEccoController@view_tambah_gambar');
        Route::post('/tambah_gambar_produk/{id}')->name('produk.gambar')->uses('Web\ProdukEccoController@tambah_gambar');
        //Route::post('/input_produk')->name('inputproduk.eccomerce')->uses('Web\ProdukEccoController@input_produk');

        Route::post('/input_produk')->name('inputproduk.eccomerce')->uses('Web\ProdukEccoController@store');
        Route::get('/hapus_produk/{id}')->name('hapusproduk.eccomerce')->uses('Web\ProdukEccoController@hapus_produk');
        Route::get('/view_update_produk/{id}')->name('update.produk')->uses('Web\ProdukEccoController@view_update_produk');
        Route::post('/update_produk/{id}')->name('update.produk')->uses('Web\ProdukEccoController@update_produk');
        Route::get('/produk/tampil/{id}')->name('tampil.produk')->uses('Web\ProdukEccoController@tampil');
        Route::get('/produk/hide/{id}')->name('hide.produk')->uses('Web\ProdukEccoController@hide');
        //kategori
        Route::get('/hapus_kategori/{id}')->name('hapuskategori.eccomerce')->uses('Web\KategoriController@hapus_kategori');
        Route::post('/update_kategori/{id}')->name('update.kategori')->uses('Web\KategoriController@update_kategori');
        Route::get('/view_update_kategori/{id}')->name('kategoriupdate.show')->uses('Web\KategoriController@view_update_kategori');
        Route::post('/input_kategori')->name('kategori.create')->uses('Web\KategoriController@create');
        //komponen harga
        Route::get('/komponenharga')->name('komponenharga.eccomerce')->uses('Web\KomponenHargaController@index');
        //Banner
        Route::get('/banner')->name('banner.eccomerce')->uses('Web\BannerController@index');
        Route::post('/input_banner')->name('banner.input')->uses('Web\BannerController@input_banner');
        Route::get('/delete_banner/{id}')->name('delete.banner')->uses('Web\BannerController@delete_banner');
        // profil
        Route::get('/profil')->name('profil')->uses('Web\ProfilController@index');
        Route::get('/user')->name('user.show')->uses('Web\UserAdminController@index');
        //berita
        Route::get('/berita')->name('berita.show')->uses('Web\BeritaController@index');
        Route::get('/tambah_berita')->name('form.berita')->uses('Web\BeritaController@form_berita');
        Route::post('/input_berita')->name('input.berita')->uses('Web\BeritaController@tambah_berita');
        Route::get('/hapus_berita/{id}')->name('hapus.berita')->uses('Web\BeritaController@hapus');
        Route::get('/view_update_berita/{id}')->name('update.show.berita')->uses('Web\BeritaController@view_update_berita');
       
        
        //Pesanan
        Route::get('/edit_pesanan')->name('edit.pesanan')->uses('Web\PesananEccoController@view_edit_pesanan');
        Route::get('/pesanan_selesai')->name('pesanan.view_selesai')->uses('Web\PesananEccoController@view_pesanan_selesai');
        Route::get('/pesanan/selesai/{id}')->name('pesanan.selesai')->uses('Web\PesananEccoController@pesanan_selesai');
        //ukm
        Route::get('/ukm')->name('ukm.view')->uses('Web\DashboardController@ukm');
        Route::get('/detail_ukm/{id}')->name('umk.detail')->uses('Web\umkmController@detail_ukm');
        Route::get('/delete_ukm/{id}')->name('delete.ukm')->uses('Web\umkmController@delete_ukm');
        Route::get('/view_update_ukm/{id}')->name('umk.edit')->uses('Web\umkmController@view_update_ukm');
        Route::get('/update_ukm/{id}')->name('umk.edit')->uses('Web\umkmController@update_ukm');
        //admin
        Route::get('/admin')->name('admin.show')->uses('Web\AdminController@index');
        Route::get('/tambah_admin')->name('admin.inputshow')->uses('Web\AdminController@view_tambah_admin');
        Route::get('/view_update_admin/{id}')->name('admin.uodateshow')->uses('Web\AdminController@view_update_admin');
        Route::post('/input_admin')->name('input.admin')->uses('Web\AdminController@input_admin');
        Route::get('/delete_admin/{id}')->name('delete.admin')->uses('Web\AdminController@delete_admin');
        Route::post('/update_admin/{id}')->name('update.admin')->uses('Web\AdminController@update_admin');
        Route::get('/view_detail_user/{id}')->name('detail.admin')->uses('Web\AdminController@view_detail_user');
        //mitra
        Route::get('/mitra')->name('mitra.show')->uses('Web\MitraController@index');
        Route::get('/tambah_mitra')->name('mitra.inputshow')->uses('Web\MitraController@view_tambah_mitra');
        Route::get('/view_update_mitra/{id}')->name('mitra.updateshow')->uses('Web\MitraController@view_update_mitra');
        Route::post('/input_mitra')->name('input.mitra')->uses('Web\MitraController@input_mitra');
        Route::get('/delete_mitra/{id}')->name('delete.mitra')->uses('Web\MitraController@delete_mitra');
        Route::post('/update_mitra/{id}')->name('update.mitra')->uses('Web\MitraController@update_mitra');
        Route::get('/view_detail_mitra/{id}')->name('mitra.detail')->uses('Web\MitraController@view_detail_mitra');
        Route::get('/peta')->name('map.menu')->uses('Web\DashboardController@map');
       
        Route::get('/anggota/komisi_korus/{id}')->name('komisi.korus.bayar')->uses('Web\KomisiKorusController@bayar');
        //Komisi
        Route::get('/komisi_korus')->name('komisi.korus')->uses('Web\KomisiKorusController@index');
        Route::get('/komisi_rantus')->name('komisi.rantus')->uses('Web\KomisiRantusController@index');
        //Kategori Induk
        Route::get('/kategori_induk')->name('kategori.induk')->uses('Web\KategoriIndukController@index');
        Route::post('/kategori_induk')->name('kategori.create.induk')->uses('Web\KategoriIndukController@input_kategoriinduk');
        Route::post('/update_kategori_induk/{id}')->name('update.kategori.induk')->uses('Web\KategoriIndukController@update_kategori_induk');
        Route::get('/view_update_kategori_induk/{id}')->name('kategoriupdateinduk.show')->uses('Web\KategoriIndukController@view_update_kategori_induk');
        Route::get('/hapus_kategori_induk/{id}')->name('hapuskategoriinduk.eccomerce')->uses('Web\KategoriIndukController@hapus_kategori_induk');

        //FINANCE
        Route::get('/finance')->name('finance.show')->uses('Web\FinanceController@index');
        Route::get('/tambah_finance')->name('tambah.finance.show')->uses('Web\FinanceController@view_tambah_finance');
        Route::post('/input_finance')->name('input.finance')->uses('Web\FinanceController@input_finance');
        Route::get('/view_detail_finance/{id}')->name('finance.detail')->uses('Web\FinanceController@view_detail_finance');
        Route::post('/update_finance/{id}')->name('update.finance')->uses('Web\FinanceController@update_finance');
        Route::get('/view_update_finance/{id}')->name('finance.updateshow')->uses('Web\FinanceController@view_update_finance');
        Route::post('/update_finance/{id}')->name('update.finance')->uses('Web\FinanceController@update_finance');
        Route::get('/delete_finance/{id}')->name('delete.finance')->uses('Web\FinanceController@delete_finance');

         // APPROVAL
         Route::get('/approval')->name('approval.eccomerce')->uses('Web\ApprovalController@index');
         Route::post('/konfirmasi/{id}')->name('konfirmasi.approval')->uses('Web\ApprovalController@konfirmasi');

        });
    });
       


//MITRA
Route::prefix('/investor')->group(function() {
    Route::get('/login','Auth\InvestorController@showLoginForm')->name('investor.login');
    Route::post('/login', 'Auth\InvestorController@login')->name('investor.login.submit');
    Route::get('/logout', 'Auth\InvestorController@logout')->name('investor.logout');
    
    Route::middleware('auth:investor')->group(function(){
        Route::get('/', 'Web\DashboardController@index_investor' )->name('investor.super_dashboard');
        Route::view('forgot_password', 'auth.reset_password')->name('password.reset');
        Route::get('/produk')->name('produk_investor.eccommerce')->uses('Web\DashboardInvestor@index_produk');
        Route::get('/pesanan')->name('pesanan_investor.eccommerce')->uses('Web\DashboardInvestor@index_pesanan');
        Route::get('/kategori')->name('kategori_investor.eccommerce')->uses('Web\DashboardInvestor@index_kategori');
        Route::get('/ongkir')->name('ongkir_investor.eccommerce')->uses('Web\DashboardInvestor@index_ongkir');
        // Anggota
        Route::get('/anggota')->name('anggota_investor.eccommerce')->uses('Web\DashboardInvestor@index_anggota');
        Route::get('/anggota/detail/{id}')->name('anggota_investor.detail')->uses('Web\DashboardInvestor@getProfileAnggota');
        Route::get('/beranda')->name('beranda_investor.eccomerce')->uses('Web\DashboardInvestor@index_investor');
        //komponen harga
        Route::get('/komponenharga')->name('komponenharga_investor.eccomerce')->uses('Web\DashboardInvestor@index_komponenharga');
        //Banner
        Route::get('/banner')->name('banner_investor.eccomerce')->uses('Web\DashboardInvestor@index_banner');
        // profil
        Route::get('/profil')->name('profil_investor')->uses('Web\DashboardInvestor@index');
        Route::get('/user')->name('user_investor.show')->uses('Web\DashboardInvestor@index');
        //berita
        Route::get('/berita')->name('berita_investor.show')->uses('Web\DashboardInvestor@index_berita');
        //Pesanan
        Route::get('/ukm')->name('ukm_investor.view')->uses('Web\DashboardInvestor@index_ukm');
        //admin
        Route::get('/admin')->name('admin_investor.show')->uses('Web\DashboardInvestor@index_admin');
        Route::get('/mitra')->name('mitra_investor.show')->uses('Web\DashboardInvestor@index_mitra');
        Route::get('/peta')->name('map_investor.menu')->uses('Web\DashboardInvestor@map');
        Route::get('/detail_ukm/{id}')->name('umk_investor.detail')->uses('Web\DashboardInvestor@detail_ukm');
        Route::get('/pesanan_selesai')->name('pesanan_investor.view_selesai')->uses('Web\DashboardInvestor@view_pesanan_selesai');
        Route::get('/user')->name('user_investor.show')->uses('Web\DashboardInvestor@index_user');
   });
});

Route::prefix('/finance')->group(function(){
    Route::get('/login','Auth\FinanceController@showLoginForm')->name('finance.login');
    Route::post('/login', 'Auth\FinanceController@login')->name('finance.login.submit');
    Route::get('/logout', 'Auth\FinanceController@logout')->name('finance.logout');

    Route::middleware('auth:finance')->group(function(){
        //finance
        Route::get('/')->name('finance.dashboard')->uses('Finance\DashboardController@index_finance');
        Route::view('forgot_password', 'auth.reset_password')->name('password.reset');

        Route::get('/user')->name('finance.user')->uses('Finance\UserAdminController@index');
        Route::get('/komisi_rantus')->name('finance.komisirantus')->uses('Finance\KomisiRantusController@index');
        Route::get('/komisi_korus')->name('finance.komisikorus')->uses('Finance\KomisiKorusController@index');
        Route::get('/peta')->name('map.menu')->uses('Finance\DashboardController@map');
        Route::get('/komponenharga')->name('komponenharga_investor.finance')->uses('Finance\DashboardInvestor@index_komponenharga');

        // ADMIN
        Route::get('/admin')->name('finance.admin')->uses('Finance\AdminController@index');
        Route::get('/tambah_admin')->name('admin.showfinance')->uses('Finance\AdminController@view_tambah_admin');
        Route::post('/input_admin')->name('input.adminfinance')->uses('Finance\AdminController@input_admin');
        Route::get('/view_detail_user/{id}')->name('detail.admin')->uses('Finance\AdminController@view_detail_user');
        Route::get('/view_update_admin/{id}')->name('admin.updateshow')->uses('Finance\AdminController@view_update_admin');
        Route::post('/update_admin/{id}')->name('update.admin')->uses('Finance\AdminController@update_admin');
        Route::get('/delete_admin/{id}')->name('delete.admin')->uses('Finance\AdminController@delete_admin');
        //MITRA
        Route::get('/mitra')->name('finance.mitra')->uses('Finance\MitraController@index');
        Route::get('/tambah_mitra')->name('mitra.inputshow')->uses('Finance\MitraController@view_tambah_mitra');
        Route::post('/input_mitra')->name('input.mitra')->uses('Finance\MitraController@input_mitra');
        Route::get('/view_detail_mitra/{id}')->name('mitra.detail')->uses('Finance\MitraController@view_detail_mitra');
        Route::get('/delete_mitra/{id}')->name('delete.mitra')->uses('Finance\MitraController@delete_mitra');
        Route::get('/view_update_mitra/{id}')->name('mitra.updateshow')->uses('Finance\MitraController@view_update_mitra');
        Route::post('/update_mitra/{id}')->name('update.mitra')->uses('Finance\MitraController@update_mitra');
        //ANGGOTA
        Route::get('/tambah_anggota')->name('tambah.anggota')->uses('Finance\AnggotaController@view_tambah_anggota');
        Route::get('/anggota')->name('finance.anggota')->uses('Finance\AnggotaController@index');
        Route::get('/anggota/detail/{id}')->name('anggota.detail')->uses('Finance\AnggotaController@getProfileAnggota');
        Route::post('/anggota/korus/angkat/{id}')->name('anggota.angkat_korus')->uses('Finance\AnggotaController@angkat_korus');
        Route::get('/anggota/korus/hapus/{id}')->name('anggota.hapus_korus')->uses('Finance\AnggotaController@hapus_korus');
        Route::post('/anggota/rantus/angkat/{id}')->name('anggota.angkat_rantus')->uses('Finance\AnggotaController@angkat_rantus');
        Route::get('/anggota/rantus/hapus/{id}')->name('anggota.hapus_rantus')->uses('Finance\AnggotaController@hapus_rantus');
        Route::get('/anggota/korus/{id}')->name('anggota.show.angkat_korus')->uses('Finance\AnggotaController@angkat_korusView');
        Route::get('/anggota/rantus/{id}')->name('anggota.show.angkat_korus')->uses('Finance\AnggotaController@angkat_rantusView');
        //UKM
        Route::get('/ukm')->name('finance.ukm')->uses('Finance\DashboardController@ukm');
        Route::get('/detail_ukm/{id}')->name('umk.detail')->uses('Finance\umkmController@detail_ukm');
        Route::get('/delete_ukm/{id}')->name('delete.ukm')->uses('Finance\umkmController@delete_ukm');
        Route::get('/view_update_ukm/{id}')->name('umk.edit')->uses('Finance\umkmController@view_update_ukm');
        Route::get('/update_ukm/{id}')->name('umk.edit')->uses('Finance\umkmController@update_ukm');
        //Pesanan
        Route::get('/pesanan')->name('pesanan.finance')->uses('Finance\PesananEccoController@index');
        Route::get('/pesanan/selesai/{id}')->name('pesanan.selesai')->uses('Finance\PesananEccoController@pesanan_selesai');
        Route::get('/pesanan_selesai')->name('pesananfinance.view_selesai')->uses('Finance\PesananEccoController@view_pesanan_selesai');
        //KATEGORI
        Route::get('/kategori')->name('kategori.finance')->uses('Finance\KategoriController@index');
        Route::get('/hapus_kategori/{id}')->name('hapuskategori.finance')->uses('Finance\KategoriController@hapus_kategori');
        Route::post('/update_kategori/{id}')->name('update.kategori.finance')->uses('Finance\KategoriController@update_kategori');
        Route::get('/view_update_kategori/{id}')->name('kategoriupdate.show.finance')->uses('Finance\KategoriController@view_update_kategori');
        Route::post('/input_kategori')->name('kategori.create.finance')->uses('Finance\KategoriController@create');
        //ONGKIR
        Route::get('/ongkir')->name('ongkir.finance')->uses('Finance\OngkirController@index');
        Route::get('/view_ongkir')->name('tambah.ongkir.finance')->uses('Finance\OngkirController@view_ongkir');
        Route::get('/delete_ongkir/{id}')->name('ongkir.delete.finance')->uses('Finance\OngkirController@delete_ongkir');
        Route::post('/update_ongkir/{id}')->name('ongkir.input.finance')->uses('Finance\OngkirController@update_ongkir');
        Route::post('/input_ongkir')->name('ongkir.input.finance')->uses('Finance\OngkirController@input_ongkir');
        Route::get('/ongkir')->name('ongkir.eccommerce.finance')->uses('Finance\OngkirController@index');
        Route::get('/view_edit_ongkir/{id}')->name('ongkir.editview.finance')->uses('Finance\OngkirController@view_edit_ongkir');  
        //BANNER
        Route::get('/banner')->name('banner.finance')->uses('Finance\BannerController@index');
        Route::post('/input_banner')->name('banner.input.finance')->uses('Finance\BannerController@input_banner');
        Route::get('/delete_banner/{id}')->name('delete.banner.finance')->uses('Finance\BannerController@delete_banner');
        //BERITA
        Route::get('/berita')->name('berita.finance')->uses('Finance\BeritaController@index');
        Route::get('/tambah_berita')->name('form.berita.finance')->uses('Finance\BeritaController@form_berita');
        Route::post('/input_berita')->name('input.berita.finance')->uses('Finance\BeritaController@tambah_berita');
        Route::get('/hapus_berita/{id}')->name('hapus.berita.finance')->uses('Finance\BeritaController@hapus');
        Route::get('/view_update_berita/{id}')->name('update.show.berita.finance')->uses('Finance\BeritaController@view_update_berita');
        //PRODUK
        Route::get('/produk')->name('produk.finance')->uses('Finance\ProdukEccoController@index');
        Route::get('/view_tambah_gambar_produk/{id}')->name('produk.gambar.finance')->uses('Finance\ProdukEccoController@view_tambah_gambar');
        Route::post('/tambah_gambar_produk/{id}')->name('produk.gambar.finance')->uses('Finance\ProdukEccoController@tambah_gambar');
        Route::post('/input_produk')->name('inputproduk.finance')->uses('Finance\ProdukEccoController@store');
        Route::get('/hapus_produk/{id}')->name('hapusproduk.finance')->uses('Finance\ProdukEccoController@hapus_produk');
        Route::get('/view_update_produk/{id}')->name('update.produk.finance')->uses('Finance\ProdukEccoController@view_update_produk');
        Route::post('/update_produk/{id}')->name('update.produk.finance')->uses('Finance\ProdukEccoController@update_produk');
        Route::get('/produk/tampil/{id}')->name('tampil.produk.finance')->uses('Finance\ProdukEccoController@tampil');
        Route::get('/produk/hide/{id}')->name('hide.produk.finance')->uses('Finance\ProdukEccoController@hide');
        Route::get('/tambah_produk')->name('tambahproduk.finance')->uses('Finance\ProdukEccoController@form_produk');
    });
});




// Route::get('/login', 'AdminAuthController@getLogin')->middleware('guest');
// Route::post('/login', 'AdminAuthController@postLogin');
// Route::get('/logout', 'AdminAuthController@logout');;







// Route::get('/verified', function(){
//     return view('welcome');
// });
// //login
// Route::get('/logis')->name('login')->uses('Auth\LoginController@login');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/test','Web\PesananEccoController@index');