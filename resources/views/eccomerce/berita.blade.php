@extends('layouts.app2')

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
                <li class="breadcrumb-item active">Berita </li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
                  @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                  @endif
            <div class="row">
                <div class="col-lg-12">
                <form action="" method="get">
                    <div class="card">
                    
                      <!-- select -->
                      
                    <div class="card-body">
                    <div class="row" style="padding:20px;">
                
                <div class="col-sm-2">
                      <div class="form-group">
                        <label>Tanggal Awal</label>
                      <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                      </div>
                </div>
                <div class="col-sm-2">
                      <div class="form-group">
                        <label>Tanggal Akhir</label>
                      <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                      </div>
                </div>
                <div class="col-sm-3" style="padding-top:30px;">
                  <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" >Filter</button>
                  <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" onclick='window.location.reload();' >Refresh</button>

            </div>
            </form>
            </div>
                    <a href="/admin/tambah_berita" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style ="float:right; font-size:15px;">Tambah Berita</a>
                <div class="card-body">
                <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Link </th>
                        <th>Tanggal</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($beritas as $berita)
                  <tr>
                        <td>{{$berita->id}}</td>
                        <td><img src="/img/berita/{{ $berita->gambar_berita}}" alt="" width="100px"></td>
                        <td>{{$berita->judul_berita}}</td>
                        <td>{{$berita->isi}}</td>
                        <td>{{$berita->link}}</td>
                        <td>{{$berita->tanggal_berita}}</td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/view_update_berita/{{$berita->id}}">Edit</a>
                            <a class="dropdown-item" href="/admin/hapus_berita/{{$berita->id}}">Delete</a>
                          </div>
                        </div>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
@endsection