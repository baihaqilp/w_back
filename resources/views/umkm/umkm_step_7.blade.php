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

      <form action="/post_umkm7" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 7 - Informasi Pendukung</b></h3>
                            </div>
                    <div class="card-body">                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Website</label>
                                    <input type="text" class="form-control" id="website" name="website" placeholder="Jenis Produk atau Layanan ">
                                </div>
                                
                                <div class="form-group">
                                <label>Social Media</label>
                                    <input type="text" class="form-control" id="sosmed" name="sosmed" placeholder="Nama Social Media">
                                    <input type="text" class="form-control" id="link_sosmed" name="link_sosmed" placeholder="Link Sosial Media">
                                </div>
                                <div class="form-group">
                                    <label >MarketPlace</label>
                                    <input type="text" class="form-control" id="marketplace" name="marketplace" placeholder="Nama Market Place">
                                    <input type="text" class="form-control" id="link_sosmed" name="link_marketplace" placeholder="Link Market Place">
                                </div>
                                <label>Kontak Pendamping/Mentor</label>
                                <p>Mohon sampaikan kontak pendamping usaha, KORUS, RANTUS, coach, mentor, ketua komunitas, kelompok usaha, pembina atau penasihat yang mendampingi pengelolaan usaha Anda (jika ada) dan bisa lebih dari 1 orang</p>
                                <div class="form-group">
                                    <label >Nama</label>
                                    <input type="text" class="form-control" id="nama_mentor" name="nama_mentor" placeholder="Nama Mentor ">
                                </div>
                                <div class="form-group">
                                    <label >Kontak(No HP/email)</label>
                                    <input type="text" class="form-control" id="kontak_mentor" name="kontak_mentor" placeholder="Kontak Mentor ">
                                </div>
                                <div class="form-group">
                                    <label >Jenis kontak</label>
                                    <input type="text" class="form-control" id="jenis_kontak_mentor" name="jenis_kontak_mentor" placeholder="Jenis Kontak Mentor ">
                                </div>
                                <div class="form-group">
                                    <label >Asosiasi/Komunitas</label>
                                    <select name="asosiasi_komunitas" id="asosiasi KOmunitas"  class="form-control">
                                      <option value="#">-- Pilih Asosiasi/Komunitas</option>
                                      <option value="LUNAS">LUNAS</option>
                                      <option value="Tangan di Atas">Tangan di Atas</option>
                                      <option value="UKM center FEB UI">UKM center FEB UI</option>
                                      <option value="PUCEL - Univ Podomoro">PUCEL - Univ Podomoro</option>
                                      <option value="PLUT - CIS">PLUT - CIS</option>
                                      <option value="KPPHI">KPPHI</option>
                                      <option value="Wiranesia Inkubator">Wiranesia Inkubator</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Nama Organisasi</label>
                                    <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" placeholder=" Nama Organisasi">
                                </div>              
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Lanjut
                                </button>
                                <a href="" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                       

      
      <!-- /.social-auth-links -->
      </form> 
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
