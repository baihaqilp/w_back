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

      <form action="/post_umkm5" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 5 - Alamat Usaha</b></h3>
                            </div>
                    <div class="card-body">                        
                            <div class="card-body">
                        
                                <div class="form-group">
                                    <label >Alamat Utama Usaha</label>
                                    <input type="text" class="form-control" id="alamat_usaha_utama" name="alamat_usaha_utama" placeholder="ALamat Usaha Utama">
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Provinsi</label>
                                    <input type="text" class="form-control" id="provinsi_usaha" name="provinsi_usaha" placeholder="Provinsi">
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Kota/Kabupaten</label>
                                    <input type="text" class="form-control" id="kota_usaha" name="kota_usaha" placeholder="Kota">
                                </div>
                               
                                <div class="form-group">
                                    <label >Alamat Usaha Lainnya</label>
                                    <input type="text" class="form-control" id="alamat_usaha_lain" name="alamat_usaha_lain" placeholder="Alamat Usaha Lain">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" id="alamat_usaha_lain2" name="alamat_usaha_lain2" placeholder="Alamat Usaha Lain">
                                </div>
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
