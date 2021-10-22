@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Mitra</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Mitra </li>
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
                <h3 class="card-title">Mitra</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              <div class="row input-datarange" style="padding:20px;">
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
                </div>
              <!-- Modal -->

              <div class="card-body">
              <div class="box-tools pull-right" style="float:right;">
             <!-- Button trigger modal -->
              <a href="/admin/tambah_mitra" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style ="float:right; font-size:15px;">Tambah Mitra</a>
              </div>
              <div class="card-body table-responsive p-0">
              <table id="example" class="table table-responsive-m p-0 table-striped table-bordered" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Foto</th>
                        <th>Created At</th>
                        <th>Update At</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                <?php ?>
               @foreach ($mitras as $mitra)
                  <tr>
                      <td>{{$mitra->id}}</td>
                      <td>{{$mitra->username}}</td>
                      <td>{{$mitra->name}}</td>
                      <td>{{$mitra->email}}</td>
                      <td><img src="/img/foto_user/{{$mitra->foto}}" alt="" width="100px"></td>
                      <td>{{$mitra->created_at}}</td>
                      <td>{{$mitra->updated_at}}</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                          <a class="dropdown-item" href="/admin/view_detail_mitra/{{$mitra->id}}">Detail</a>
                            <a class="dropdown-item" href="/admin/view_update_mitra/{{$mitra->id}}">Edit</a>
                            <a class="dropdown-item" href="/admin/delete_mitra/{{$mitra->id}}">Delete</a>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    
   
<!-- page script -->
    
@endsection