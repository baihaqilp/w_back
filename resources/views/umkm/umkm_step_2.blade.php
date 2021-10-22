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

      <form action="/post_umkm2" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 2 - Informasi Produk atau Layanan</b></h3>
                            </div>
                    <div class="card-body">                        
                            <div class="card-body">
                            <form action="/post_umkm2" method="POST">
                                <div class="form-group">
                                    <label >Jenis Produk atau Layanan</label>
                                    <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" placeholder="Jenis Produk atau Layanan ">
                                </div>
                                <div class="form-group">
                                    <label >Foto Produk atau Layanan</label>
                                    <input type="file" class="form-control" id="foto_produk" name="foto_produk">
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Bahan baku</label>
                                    <input type="text" class="form-control" id="bahan_baku" name="bahan_baku">
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Kebutuhan Bahan baku</label>
                                    <input type="text" class="form-control" id="kebutuhan_bahan" name="kebutuhan_bahan">
                                </div>
                                <div class="form-group">
                                    <label >Nama Merk Dagang</label>
                                    <input type="text" class="form-control" id="nama_merk" name="nama_merk" placeholder="nama_merk">
                                </div>
                                <div class="form-group">
                                    
                                    <label >Deskripsi Produk</label>
                                    <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" placeholder="Deskripsi Produk">
                                </div>
                                <div class="form-group">
                                    <label >Varisi Produk atau Varian</label>
                                    <input type="text" class="form-control" id="variasi_produk" name="variasi_produk" placeholder="Varian Produk">
                                </div>
                                <div class="form-group">
                                    <label >Deskripsi Kegiatan Usaha</label>
                                    <input type="text" class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" placeholder="Deskripsi Usaha">
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
