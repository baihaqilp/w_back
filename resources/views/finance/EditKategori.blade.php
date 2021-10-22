@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Berita</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Berita </li>
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
                      <form action="/finance/update_kategori/{{$kategoris->id}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        
                    </div>
                    <div class="card">
                    <div class="card-body">
    
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Nama Kategori</label>
                                    <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" value="{{$kategoris->nama_kategori}}">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori Produk</label>
                                    <input type="text" class="form-control" id="kategori_induk" name="kategori_induk" value="{{$kategoris->kategori_induk}}">
                                </div>
                                <div class="form-group">
                                    <label >Urutan</label>
                                    <input type="text" class="form-control" id="urutan" name="urutan" value="{{$kategoris->urutan}}">
                                </div>
                                <div class="form-group">
                                    <label>Visibilitas</label>
                                    <select class="form-control" id="visibilitas" name="visibilitas" value="{{$kategoris->visibilitas}}">
                                    <option value ="1">Iya</option>
                                    <option value ="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tampilkan di Beranda</label>
                                    <select class="form-control" id="tampil" name="tampil" value="{{$kategoris->tampil}}">
                                    <option value ="1">Iya</option>
                                    <option value ="0">Tidak</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upload Gambar</label>
                                    <label for="image">Choose Image</label>
                                    <input id="image" type="file" name="image" value="{{$kategoris->image}}">
                                </div>                          
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/finance/kategori" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>

        
    </section>
    
@endsection

