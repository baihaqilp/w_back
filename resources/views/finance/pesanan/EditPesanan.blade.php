@extends('layouts.app2')

@section('content')

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Pesanan </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
             
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    
                      <!-- select -->
                      <form action="/admin/update_produk/" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                    <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="card-title"><b>No PO : </b></h3>
                        </div>
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nama Penerima</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" >
                                </div>
                                <div class="form-group">
                                    <label >Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" >
                                </div>
                                <div class="form-group">
                                    <label >Harga Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" >
                                </div>
                                <div class="form-group">
                                    <label >Metode Pembayaran</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" >
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/tambah_produk" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                    </div>
                    </div>
                   
                </div>
        </div>

    </section>
    
@endsection
