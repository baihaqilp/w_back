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

      <form action="/post_umkm3" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 3 - Informasi Karyawan</b></h3>
                            </div>
                    <div class="card-body">                        
                            <div class="card-body">
                            <form action="/post_umkm3" method="POST"></form>
                                <div class="card-header">
                                    <h2>Informasi Karyawan</h2>
                                </div>
                                <div class="form-group">
                                    <label >Karyawan Tetap pria</label>
                                    <input type="text" class="form-control" id="karyawan_tetap_pria" name="karyawan_tetap_pria" placeholder="Laryawan tetap pria">
                                </div>
                                <div class="form-group ">
                                    <label >Karyawan Tidak Tetap Pria</label>
                                    <input type="text"  class="form-control" id="karyawan_tidak_tetap_pria" name="karyawan_tidak_tetap_pria" placeholder="Karyawan tidak tetap pria">
                                </div>
                                <div class="form-group">
                                    <label >Karyawan Tetap Wanita</label>
                                    <input type="text" class="form-control" id="karyawan_tetap_wanita" name="karyawan_tetap_wanita" placeholder="Karywan tetap wanita">
                                </div>
                                <div class="form-group">
                                    <label >Karyawan Tidak Tetap Wanita</label>
                                    <input type="text" class="form-control" id="karyawan_tidak_tetap_wanita" name="karyawan_tidak_tetap_wanita" placeholder="Karyawan tidak tetap wanita">
                                </div>
                                <div>
                                    <h2>Jajaran Pengurus</h2>
                                </div>
                                <div class="form-group">
                                    <label >Nama</label>
                                    <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus" placeholder="Nama pengurus">
                                </div>
                                <div class="form-group">
                                    
                                    <label >Kontak</label>
                                    <input type="text"  class="form-control" id="kontak" name="kontak" placeholder="Kontak">
                                </div>
                                <div class="form-group">
                                    <label >Jabatan</label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" placeholder="Jabatan">
                                </div>
                                              
                                <button type="submit" class="btn btn-info btn-lg " role="button" style ="float:right;">Lanjut</button>

                                <button class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</button>
                                </form>
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
