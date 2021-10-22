@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Kategori Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Kategori Produk </li>
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
          <form action="" method="get">
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
                    <form action="" method="post"></form>
                    <form action="{{route('kategori.create.finance')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="nama_kategori" class="col-form-label">Nama Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required>
                      </div>
                      <div class="form-group">
                        <label for="kategori_produk" class="col-form-label">Kategori Induk</label>
                        <!--<textarea class="form-control" id="kategori_produk" name="kategori_induk"></textarea>-->
                        <input type="text" class="form-control" id="kategori_induk" name="kategori_induk" required>
                      </div>
                      <div class="form-group">
                        <label for="urutan" class="col-form-label">Urutan</label>
                        <input type="number" class="form-control" id="urutan"name="urutan" min ='0' required>
                      </div>
                      <div class="form-group">
                        <label>Visibilitas</label>
                        <select class="form-control" id="visibilitas" name="visibilitas" required>
                          <option value ="1">Iya</option>
                          <option value ="0">Tidak</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Tampilkan di Beranda</label>
                        <select class="form-control" id="tampil" name="tampil" required>
                          <option value ="1">Iya</option>
                          <option value ="0">Tidak</option>
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Upload Gambar</label>
                          <label for="image">Choose Image</label>
                          <input id="image" type="file" name="image" required>
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
              <!--<div class="row" style="padding:20px;">
                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal Awal</label>
                            <input type="date" class="form-control"id="tanggal_awal">
                            </div>
                      </div>
                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal Akhir</label>
                            <input type="date" class="form-control"id="tanggal_akhir">
                            </div>
                      </div>
                      <div class="col-sm-2" style="padding-top:30px;">
                        <button type="button" class="btn btn-primary" >FIlter</button>
                        <button type="button" class="btn btn-warning" >Print PDF</button>
                  </div>
              </div>-->
              
              <div class="box-tools pull-right" style="float:right;">
             
             <!-- Button trigger modal -->
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-kategori">
                Tambah Data
              </button>
              </div>
              <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
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
                            <a class="dropdown-item" href="/finance/view_update_kategori/{{$kategori->id}}">Edit</a>
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
      </div>
      <!-- /.container-fluid -->
      <script  type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js ">
      $('.dropdown-item').on('click',function(){
        console.log($(this).data('id'))
      })
    </script>
    </section>
    
   
<!-- page script -->
    
@endsection