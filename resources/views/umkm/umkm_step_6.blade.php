<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Warkopin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../AdminLTE/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../AdminLTE/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body >

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body ">
    <img src="{{url('../AdminLTE/dist/img/logo_warkopin.png') }}" width="270px" style="padding:20px;">
      <h2>DAFTAR ANGGOTA UMKM</h2>

      <form action="/post_umkm6" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 6 - Upload Berkas</b></h3>
                            </div>
                    <div class="card-body">                        
                           <form action="">
                           <table class="table table-responsive" >
                           <form action="/post_umkm6"></form>
                           <h4>List Berkas Perijinan</h4>
                            <tr>
                              <td><label>Ijin Usaha Mikro Kecil (IUMK)</label></td>
                              <td><label><input type="checkbox" id="iumk" name="iumk" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Surat Keterangan Domisili usaha(SKDU)/Surat Keterangan Usaha</label></td>
                              <td><label><input type="checkbox" id="sku" name="sku" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Ijin Usaha Industri</label></td>
                              <td><label><input type="checkbox" id="izin_usaha_industri" name="izin_usaha_industri" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Tanda Daftar Perusahaan (TDP)/Surat Izin Usaha Perdagangan (SIUP)/ Nomor Induk Berusaha (NIB)</label></td>
                              <td><label><input type="checkbox" id="surat_ijin" name="surat_ijin" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>NPWP Pemilik</label></td>
                              <td><label><input type="checkbox" id="npwp_pemilik" name="npwp_pemilik" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>NPWP Badan Usaha</label></td>
                              <td><label><input type="checkbox" id="npwp_bu" name="npwp_bu" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>SK Pengesahan Badan Usaha</label></td>
                              <td><label><input type="checkbox" id="sk_usaha" name="sk_usaha" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Tanda Daftar Usaha Parawisata (TDUP)</label></td>
                              <td><label><input type="checkbox" id="tdup" name="tdup" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Akta Pendirian Badan Usaha (Halaman Sampul saja)</label></td>
                              <td><label><input type="checkbox" id="akta_usaha" name="akta_usaha" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Ijin Mendirikan Bangunan</label></td>
                              <td><label><input type="checkbox" id="imb" name="imb" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Saya Belum Memiliki Berkas Perizinan Apapun</label></td>
                              <td><label><input type="checkbox" id="tanpaberkas" name="tanpaberkas" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Ijin Usaha Mikro Kecil (IUMK)</label></td>
                              <td><input type="file" id="foto_iumk" name="foto_iumk"></td>
                            </tr>
                            <tr>
                              <td><label>Foto Surat Keterangan Domisili usaha(SKDU)/Surat Keterangan Usaha</label></td>
                              <td><label><input type="file" id="foto_sku" name="foto_sku"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Ijin Usaha Industri</label></td>
                              <td><label><input type="file" id="foto_izin_usaha_industri" name="izin_usaha_industri"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Tanda Daftar Perusahaan (TDP)/Surat Izin Usaha Perdagangan (SIUP)/ Nomor Induk Berusaha (NIB)</label></td>
                              <td><label><input type="file" id="foto_surat_ijin" name="foto_surat_ijin"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto NPWP Pemilik</label></td>
                              <td><label><input type="file" id="foto_npwp_pemilik" name="foto_npwp_pemilik"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto NPWP Badan Usaha</label></td>
                              <td><label><input type="file" id="foto_npwp_bu" name="foto_npwp_bu"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto SK Pengesahan Badan Usaha</label></td>
                              <td><label><input type="file" id="foto_sk_usaha" name="sk_usaha"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Tanda Daftar Usaha Parawisata (TDUP)</label></td>
                              <td><label><input type="file" id="foto_tdup" name="foto_tdup"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Akta Pendirian Badan Usaha (Halaman Sampul saja)</label></td>
                              <td><label><input type="file" id="foto_akta_usaha" name="foto_kta_usaha"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto jin Mendirikan Bangunan</label></td>
                              <td><label><input type="file" id="foto_imb" name="foto_imb"></label></td>
                            </tr>
                            <tr><td><h4>List Berkas Sertifikat</h4></td></tr>
                            <tr>
                              <td><label>Sertifikat Produksi Pangan Industri Rumah Tangga (PIRT)</label></td>
                              <td><label><input type="checkbox" id="pirt" name="pirt" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Sertifikat Hak Kekayaan Intelektual (Hak Merek, Hak Cipta, Desain Industri, Hak Paten, dll)</label></td>
                              <td><label><input type="checkbox" id="sh" name="sh" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Standard Negara Indonesia (SNI)</label></td>
                              <td><label><input type="checkbox" id="sni" name="sni" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Izin Edar Alat Kesehatan (hazmat, masker medis, ventilator, dll)</label></td>
                              <td><label><input type="checkbox" id="izin_alat_kesehatan" name="izin_alat_kesehatan" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Izin Edar Perbekalan Kesehatan Rumah Tangga (PKRT)</label></td>
                              <td><label><input type="checkbox" id="pkrt" name="pkrt" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>International Standard Organization (Sertifikat ISO)</label></td>
                              <td><label><input type="checkbox" id="iso" name="iso" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Pelatihan Keamanan Makanan/Penjamah Makanan</label></td>
                              <td><label><input type="checkbox" id="keamanan" name="keamanan" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Sertifikat Halal</label></td>
                              <td><label><input type="checkbox" id="halal" name="halal" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Sertifikat BPOM (MD, ML, Obat-obatan, kosmetik)</label></td>
                              <td><label><input type="checkbox" id="bpom" name="bpom" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Sertifikasi Khusus Produk Pangan (HACCP, GMP, BRCGS, Organik, dan sejenisnya)</label></td>
                              <td><label><input type="checkbox" id="sertifikat_khusus_pangan" name="sertifikat_khusus_pangan" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Sertifikasi Produk non-Pangan (FSC, FairTrade, SVLK, JAS, dan sejenisnya)</label></td>
                              <td><label><input type="checkbox" id="sertifikat_non_pangan" name="sertifikat_non_pangan" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Saya Belum Memiliki Sertifikat Apapun</label></td>
                              <td><label><input type="checkbox" id="tanpa_sertifikat" name="tanpa_sertifikat" value="true"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Sertifikat Produksi Pangan Industri Rumah Tangga (PIRT)</label></td>
                              <td><label><input type="file" id="foto_pirt" name="pirt"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Sertifikat Hak Kekayaan Intelektual (Hak Merek, Hak Cipta, Desain Industri, Hak Paten, dll)</label></td>
                              <td><label><input type="file" id="foto_sh" name="foto_sh"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Standard Negara Indonesia (SNI)</label></td>
                              <td><label><input type="file" id="foto_sni" name="foto_sni"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Izin Edar Alat Kesehatan (hazmat, masker medis, ventilator, dll)</label></td>
                              <td><label><input type="file" id="foto_izin_alat_kesehatan" name="foto_izin_alat_kesehatan"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Izin Edar Perbekalan Kesehatan Rumah Tangga (PKRT)</label></td>
                              <td><label><input type="file" id="foto_pkrt" name="foto_pkrt"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto International Standard Organization (Sertifikat ISO)</label></td>
                              <td><label><input type="file" id="foto_iso" name="foto_iso"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Pelatihan Keamanan Makanan/Penjamah Makanan</label></td>
                              <td><label><input type="file" id="foto_keamanan" name="foto_keamanan"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Sertifikat Halal</label></td>
                              <td><label><input type="file" id="foto_halal" name="fotohalal"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Sertifikat BPOM (MD, ML, Obat-obatan, kosmetik)</label></td>
                              <td><label><input type="file" id="foto_bpom" name="foto_bpom"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Sertifikasi Khusus Produk Pangan (HACCP, GMP, BRCGS, Organik, dan sejenisnya)</label></td>
                              <td><label><input type="file" id="foto_sertifikat_khusus_pangan" name="foto_sertifikat_khusus_pangan"></label></td>
                            </tr>
                            <tr>
                              <td><label>Foto Sertifikasi Produk non-Pangan (FSC, FairTrade, SVLK, JAS, dan sejenisnya)</label></td>
                              <td><label><input type="file" id="foto_sertifikat_non_pangan" name="foto_sertifikat_non_pangan"></label></td>
                            </tr>
                           </table>
                           <button type="submit" class="btn btn-info btn-lg " role="button" style ="float:right;">Lanjut</button>

                                <button class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</button>
                            
                         
                             </div>
                        </form> 

      
      <!-- /.social-auth-links -->
      
    </div>
    <!-- /.login-card-body -->

<!-- /.login-box -->

<!-- jQuery -->
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.min.js"></script>

</body>
</html>
