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

      <form action="/post_umkm4" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 4 - Informasi Personal</b></h3>
                            </div>
                    <div class="card-body">                        
                            <div class="card-body">
                           
                                <div class="card-header">
                                    <h2>Profil Penanggung Jawab Usaha</h2>
                                </div>
                                <div class="form-group">
                                    <label >Nomor KTP</label>
                                    <input type="text" class="form-control" id="no_ktp_pj" name="no_ktp_pj" placeholder="Nomor KTP Penanggung Jawab">
                                </div>
                                <div class="form-group">
                                    <label >Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap Penanggung Jawab">
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label >Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label >Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi">
                                </div>
                                <div class="form-group">
                                    <label >Kota/Kabupaten</label>
                                    <input type="text" class="form-control" id="kota" name="kota" placeholder="Kota/Kabupaten">
                                </div>
                                <div class="form-group">
                                    <label >Kecamatan/Desa</label>
                                    <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa">
                                </div>
                                <div class="form-group">
                                    <label >Kode Pos</label>
                                    <input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
                                </div>
                                <div class="form-group">
                                    <label >Nomor Telepon Rumah</label>
                                    <input type="text" class="form-control" id="no_telp_rumah" name="no_telp_rumah" placeholder="Nomor Telepon Rumah">
                                </div>
                                <div class="form-group">
                                    <label >Nomor Handphone</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor Handphone">
                                </div>
                                <div class="form-group">
                                    <label >Foto KTP</label>
                                    <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" placeholder="Foto_ktp">
                                </div>              
                                <div class="form-group">
                                    <label >Foto Penanggung Jawab Utama</label>
                                    <input type="file" class="form-control" id="foto_pj" name="foto_pj" placeholder="Foto Penanggung Jawab">
                                </div>
                                <button type="submit" class="btn btn-info btn-lg " role="button" style ="float:right;">Lanjut</button>

                                <button class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</button>
                            </div>
                       

      
      <!-- /.social-auth-links -->
      
    </div> </form> 
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
