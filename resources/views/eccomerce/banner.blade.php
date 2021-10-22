@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Banner</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Banner </li>
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
                <h3 class="card-title"> Banner</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              
              <!-- Modal -->
              <div class="modal fade" id="tambah-banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Banner</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post"></form>
                    <form action="{{route('banner.input')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label class="col-form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="banner" name="banner">
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
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-banner">
                Tambah Banner
              </button>
              </div>
              <div class="card-body table-responsive p-0">
              <table id="example" class="table table-responsive-m p-0 table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Gambar</th>
                        <th>Gambar</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php ?>
                @foreach ($banners as $banner)
                  <tr>
                      <td>{{$banner->id}}</td>
                      <td>{{$banner->banner}}</td>
                      <td><img src="/img/banner/{{$banner->banner}}" alt="" width="100px"></td>
                      <td>
                      <div class="btn-group">
                        <a href="/admin/delete_banner/{{$banner->id}}" type="button" class="btn btn-danger">Hapus</a>
                      </div>
                      </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>  
              </div>
              
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