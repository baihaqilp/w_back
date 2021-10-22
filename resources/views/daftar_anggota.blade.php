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
      

      <form action="/input_anggota" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                   
                    <div class="card-body">      
                    <h2>DAFTAR ANGGOTA KOPERASI</h2>                  
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <label >Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" placeholder="Tempat Lahir">
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" placeholder="Tanggal Lahir">
                                </div>
                                <div class="form-group">
                                    <label >Nomor KTP</label>
                                    <input type="text" class="form-control" id="no_ktp" name="no_ktp" placeholder="Nomor Ktp">
                                </div>
                                <div class="form-group">
                                    <label >Nomor KK</label>
                                    <input type="text" class="form-control" id="no_kk" name="no_kk" placeholder="Nomor KK">
                                </div>
                                <div class="form-group">
                                    <label >Alamat Rumah</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label >Jenis Kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
                                        <option >-- Pilih Jenis Kelamin --</option>
                                        <option value="perempuan">Perempuan</option>
                                        <option value="laki-laki">Laki-laki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Nomor HP</label>
                                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP">
                                </div>           
                                <div class="form-group">
                                    <label >Pekerjaan</label>
                                    <select class="form-control" name="pekerjaan" id="pekerjaan">
                                        <option >-- Pilih Pekerjaan --</option>
                                        <option value="karyawan">Karyawan</option>
                                        <option value="petani">Petani</option>
                                        <option value="peternak">Peternak</option>
                                        <option value="pedagang">Pedagang</option>
                                        <option value="umkm">UMKM</option>
                                        <option value="buruh">Buruh</option>
                                        <option value="ibu_rumah_tangga">Ibu Rumah Tangga</option>
                                        <option value="lainnyai">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Detail Pekerjaan</label>
                                    <input type="text" class="form-control" id="detail_pekerjaan" name="detail_pekerjaan" placeholder="contoh : Karyawan Swasta">
                                </div>
                                    <div class="form-group">
                                        <label for="">Foto KTP</label>
                                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" placeholder="image">
                                    </div>
                                <p></p>
                                              
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Daftar
                                </button>
                                <a href="/input_anggota" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
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
