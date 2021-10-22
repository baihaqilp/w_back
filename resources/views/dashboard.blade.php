@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Beranda</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Beranda </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <!--<div class="info-box mb-3 item1">
          <div class="info-box-content">
                @widget('pengguna')
          </div>
          </div>
          <div class="info-box mb-3 item2">
          <div class="info-box-content">
                <span class="info-box-text"><h2>Transaksi</h2></span>
                <span class="info-box-number">Bulan 1000.000.000</span>
                <span class="info-box-number">Minggu 50.000.000</span>
                <span class="info-box-number">Hari 5.000.000</span>
          </div>
          </div>
          <div class="info-box mb-3 item3"></div>  
          <div class="info-box mb-3 item4">
            @widget('topDaerah')
          </div>
          <div class="info-box mb-3 item5">
          <div class="info-box-content">
                <span class="info-box-text"><h2>Produk</h2></span>
                <span class="info-box-number">Total 1.000.000.000</span>
                <span class="info-box-number">Sembako 50.000.000</span>
                <span class="info-box-number">UKM 5.000.000</span>
          </div>
          </div>
          </div>-->
          <div class="row">
            <div class="col-lg-3 col-6 ">
              <!-- small box -->
              @widget('pengguna')
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              @widget('topDaerah')
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              @widget('transaksi')
            </div>
            <div class="col-lg-3 col-6">
              <!-- small box -->
              @widget('produk')
            </div>  
          </div>
          <div class="row">
            @widget('chart')
          </div>
        </div>
    </section>
    
@endsection