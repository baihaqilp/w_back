<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Warkopin</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{asset('AdminLTE/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset ('AdminLTE/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset ('AdminLTE/dist/css/adminlte.min.css') }}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">

  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
    <img src="{{url('../AdminLTE/dist/img/logo_warkopin.png') }}" width="270px" style="padding:20px;">
      <p class="login-box-msg">PILIH LOGIN SEBAGAI :</p>


      <div class="card" style="width: 18rem; margin-left:15px;">
        <ul class="list-group list-group-flush">
        
      
      
            <li class="list-group-item"><a class="btn btn-primary" href="/admin" role="button" style="width: 15rem;" >SUPER ADMIN</a></li>
            <li class="list-group-item"><a class="btn btn-primary" href="/finance" role="button" style="width: 15rem;" >FINANCE</a></li>
            <!-- <li class="list-group-item"><a class="btn btn-success" href="#" role="button" style="width: 15rem;">ADMIN</a></li> -->
            <li class="list-group-item"><a class="btn btn-warning" href="/investor" role="button" style="width: 15rem;">MITRA</a></li>
        </ul>
      </div>
      
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="../AdminLTE/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../AdminLTE/dist/js/adminlte.min.js"></script>

</body>
</html>
