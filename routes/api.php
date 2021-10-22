<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['api'])->group(function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::get('me', 'AuthController@me')->middleware('log.route');
    Route::get('mitrame', 'AuthController@mitraMe')->middleware('log.route');

    Route::post('register', 'RegistrationController@register');
    Route::get('email/verify/{id}', 'VerificationController@verify')->name('verification.verify');
    Route::get('email/resend', 'VerificationController@resend')->name('verification.resend');
    Route::post('password/email', 'ForgotPasswordController@forgot');
    Route::post('password/reset', 'ForgotPasswordController@reset')->name('password.reset');

    Route::patch('user/profile', 'UserController@updateProfile');

    Route::get('produk', 'ProdukController@index');
    Route::get('produk/{id}', 'ProdukController@getbyId');
    Route::get('produk/kategori/{id}', 'ProdukController@getbyCategory');
    Route::post('produk', 'ProdukController@create');
    Route::put('produk/{id}', 'ProdukController@update');
    Route::delete('produk/{id}', 'ProdukController@delete');
    Route::get('produk/image/{filename}','ImageController@imageProduk');
    Route::get('produk/search/{key}','ProdukController@search');


    Route::get('pesan', 'PesananController@index');
    //Route::get('pesan/{id}', 'ProdukController@show');
    Route::post('pesan', 'PesananController@create');
    // Route::put('produk/{id}', 'ProdukController@update');
    // Route::delete('produk/{id}', 'ProdukController@delete');
    Route::get('pesan/id/{id_user}','PesananController@getByIDPesanan');
    Route::get('pesan/{id_user}','PesananController@getByIDUserPesanan');
    Route::put('pesan/updatestatus/{id}', 'PesananController@updatestatus');
    Route::get('pesan/status/{id}','PesananController@getPesananbyStatus');

    Route::get('kategori', 'KategorisController@index');
    Route::get('kategori/{id}', 'KategorisController@show');
    Route::post('kategori', 'KategorisController@create');
    Route::put('kategori/{id}', 'KategorisController@update');
    Route::delete('kategori/{id}', 'KategorisController@delete');
    Route::get('kategori/image/{filename}','ImageController@imageKategori');


    Route::get('provinsi','DaerahsController@getAllProvinsi');
    Route::get('provinsi/{id}','DaerahsController@provinsi');
    Route::post('kota','DaerahsController@kota');
    Route::get('kota/{id}','DaerahsController@kotadetail');
    Route::post('kecamatan','DaerahsController@kecamatan');
    Route::get('kecamatan/{id}','DaerahsController@kecamatandetail');
    Route::post('desa','DaerahsController@desa');
    Route::get('desa/{id}','DaerahsController@desadetail');



    Route::get('alamat/{id_user}','AddressesController@getAddress');
    Route::get('alamat/id/{id_user}','AddressesController@getbyIdAddress');
    Route::post('alamat','AddressesController@addAddress');
    Route::post('alamat/updatemain','AddressesController@updateMainAddress');
    Route::get('ongkir/{id_daerah}','OngkirsController@getByAlamat');


    Route::get('mitra/{id_user}','MitrasController@getAnggota');
    Route::post('mitra/orderstok','MitrasController@permintaanStok');
    //Route::get('/produk')->name('produk.eccommerce')->uses('ProdukController@index');
    Route::get('mitra/komisi/{id_user}','MitrasController@getKomisiDetail');
    Route::get('mitra/korus/pesanan/{no_korus}','KorusController@getAnggotaPesan');


    Route::get('test','MitrasController@getPesanan');

    Route::get('berita','BeritaController@index');
    Route::get('berita/detail/{id}','BeritaController@getDetail');
    Route::get('berita/image/{filename}','ImageController@imageBerita');

    Route::post('update/foto/{id}','UserController@updateFoto');
    Route::post('update/alamat/{id}','UserController@updateAlamat');
    Route::post('update/akun/{id}','UserController@updateAkun');
    Route::get('user/image/{file_name}','ImageController@imageProfil');

    Route::post('update/foto','UserController@updateFoto');
    Route::post('update/alamat/{id}','UserController@updateAlamat');

    Route::get('korus/anggota/pesan/{no_korus}','KorusController@getAnggotaPesan');
    Route::get('korus/anggota/{no_korus}','KorusController@getAnggota');
    Route::get('korus/anggota/pesanan/{id_anggota}','KorusController@getPesanan');
    Route::get('korus/komisi/{id_korus}','KorusController@getKomisi');
    Route::get('korus/komisi/monthly/{id_korus}','KorusController@getTotalKomisiBulanini');
    Route::get('korus/pesan/rantus/{no_korus}','KorusController@GetKomulatif');
    Route::post('korus/pesan','KorusController@PesanRantus');
    Route::get('korus/riwayat/{kode}','KorusController@riwayat');


    Route::get('rantus/anggota','RantussController@getAnggota');
    Route::get('rantus/pesanan/{no_korus}','RantussController@getPesanan');
    Route::get('rantus/komisi/{id}','RantussController@getKomisi');
    Route::get('rantus/komisi/monthly/{id_korus}','RantussController@getTotalKomisiBulanini');
    Route::put('rantus/pesanan/terima/{id}','RantussController@TerimaPesanan');
    Route::put('rantus/pesanan/kirim/{id}','RantussController@KirimPesanan');
    Route::get('rantus/riwayat/{kode}','RantussController@Riwayat');



    //Banner
    Route::get('banner','BannerController@index');
    Route::get('banner/image/{file_name}','ImageController@imageBanner');

    Route::get('anggota_koperasi','DataKoperasiController@getAnggota');
    
    Route::get('test/{id_korus}','AuthController@Komisi_Korus');

    Route::post('saveToken','FCM@saveTokenEcom');
    Route::post('mitra/saveToken','FCM@saveTokenMitra');

    Route::post('testdata/{id}','testController@testdata');
});


