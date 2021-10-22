@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data User</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Data User </li>
              </ol>
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori Produk</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="tambah-kategori" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('kategori.create')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="nama_kategori" class="col-form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                      </div>
                      <div class="form-group">
                        <label for="kategori_produk" class="col-form-label">Kategori Induk</label>
                        <textarea class="form-control" id="kategori_produk" name="kategori_induk"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="urutan" class="col-form-label">Urutan</label>
                        <input class="form-control" id="urutan"name="urutan">
                      </div>
                      <div class="form-group">
                        <label>Visibilitas</label>
                        <select class="form-control" id="visibilitas" name="visibilitas">
                          <option value ="1">Iya</option>
                          <option value ="0">Tidak</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tampilkan di Beranda</label>
                        <select class="form-control" id="tampil" name="tampil">
                          <option value ="1">Iya</option>
                          <option value ="0">Tidak</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Upload Gambar</label>
                          <label for="image">Choose Image</label>
                          <input id="image" type="file" name="image">
                      </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                    </div>
                    
                  </div>
                </div>
              </div>

              <div class="card-body">
              <div class="box-tools pull-right" style="float:right;">
             <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-kategori">
                Tambah Data
              </button>
              </div>
              <table id="example" class="table table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Kategori Produk</th>
                        <th>Urutan</th>
                        <th>Visibilitas</th>
                        <th>Tampilkan di Beranda</th>
                        <th>Nama Gambar</th>
                        <th>Gambar</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php ?>
                @foreach($kategoris as $kategori)
                  <tr>
                        <td>
                        </td>
                        <td>{{$kategori->id}}</td>
                        <td>{{$kategori->nama_kategori}}</td>
                        <td>{{$kategori->kategori_induk}}</td>
                        <td>{{$kategori->urutan}}</td>
                        <td>@switch($kategori->visibilitas)
                            @case(0)
                                <span class="badge badge-danger">Tidak</span>
                                @break

                            @case(1)
                                <span class="badge badge-success">Ya</span>
                                @break
                            
                            @default
                                <span class="badge badge-pill badge-warning">Belum Di setting</span>
                        @endswitch</td>

                        <td>@switch($kategori->tampil)
                            @case(0)
                                <span class="badge badge-danger">Tidak</span>
                                @break

                            @case(1)
                                <span class="badge badge-success">Ya</span>
                                @break
                            
                            @default
                                <span class="badge badge-pill badge-warning">Belum Di setting</span>
                        @endswitch</td>
                        <td>{{$kategori->image}}</td>
                        <td><img src="/img/kategori/{{ $kategori->image}}" alt="" width="50px"></td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/update_kategori/{{$kategori->id}}" data-toggle="modal" data-target="#edit-kategori">Edit</a>
                            <a class="dropdown-item" href="/hapus_kategori/{{$kategori->id}}">Delete</a>
                          </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>  
              
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
   
<!-- page script -->
    
@endsection