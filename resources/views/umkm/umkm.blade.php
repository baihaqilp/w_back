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
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body ">
    <img src="{{url('../AdminLTE/dist/img/logo_warkopin.png') }}" width="270px" style="padding:20px;">
      <h2>DAFTAR ANGGOTA UMKM</h2>
        @if ($message = Session::get('success'))

        <div class="alert alert-success">

            <p>{{ $message }}</p>

        </div>

        @endif
            <form action="/post_umkm" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-header">
                                <h3 class="card-title"><b> Step 1 - Informasi Badan Usaha</b></h3>
                            </div>
                    <div class="card-body">                        
                            <div class="card-body">
                           
                                <div class="form-group">
                                    <label >Nama Usaha dan Perusahaan</label>
                                    <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" placeholder="Nama Usaha " required/>
                                </div>
                                <div class="form-group">
                                    <label >Bentuk Badan Usaha</label>
                                    <input type="text" class="form-control" name="bentuk_usaha" id="bentuk_usaha" placeholder="Bentuk Usaha" required/>
                                </div>
                                <div class="form-group col-md-4">
                                    <label >Tahun memulai usaha</label>
                                    <input type="text" class="form-control" id="tahun_usaha" name="tahun_usaha" placeholder="Tahun Usaha" required/>
                                </div>
                                <div class="form-group">
                                    <label >Omset Tahunan</label>
                                    <input type="text" class="form-control" id="omset" name="omset" placeholder="Omset Tahunan" required/ >
                                </div>
                                <div class="form-group">
                                    
                                    <label >Bidang Usaha</label>
                                    <select name="bidang_usaha" id="bidang_usaha" class="form-control" required/>
                                        <option value="0">-- Pilih Bidang Usaha --</option>
                                        <option value="Perdagangan Grosir">Perdagangan Grosir</option>
                                        <option value="Perdagangan Eceran">Perdagangan Eceran(warung,toko mainan,dll)</option>
                                        <option value="Produksi Makanan Minuman Berkemasan resiko rendah">Produksi Makanan Minuman Berkemasan resiko rendah(tanpa pengawet, masa kadaluarsa kurang dari 7 hari)</option>
                                        <option value="Rumah Pemotongan Hewan">Rumah Pemotongan Hewan</option>
                                        <option value="Produksi Pakaian Jadi">Produksi Pakaian Jadi</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label >Nomor Telepon Usaha</label>
                                    <input type="text" class="form-control" id="no_telp_usaha" name="no_telp_usaha" placeholder="Nomor Telepon Usaha" required/>
                                </div>
                                              
                                <button type="submit" class="btn btn-info btn-lg " role="button" style ="float:right;">Lanjut</button>

                                <button class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</button>
                              
                            </div>
                       

      
      <!-- /.social-auth-links -->
      
    </div>
    </form>
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
