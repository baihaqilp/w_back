@extends('layouts.app_investor')

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

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Kategori Produk</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              
              <div class="card-body">
              <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
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
      <script  type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js ">
      $('.dropdown-item').on('click',function(){
        console.log($(this).data('id'))
      })
    </script>
    </section>
    
   
<!-- page script -->
    
@endsection