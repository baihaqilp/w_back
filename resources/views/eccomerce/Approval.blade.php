@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Approval</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Approval </li>
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
            </div>
                    
                <div class="card-body">
                <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Modifikasi</th>
                      
                        <th>Created At</th>
                        <th>Updated AT</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                  <?php ?>
                  @foreach ($modifs as $modif)
                  <tr>
                    <td>{{$modif->id}}</td>
                    <td>{{$modif->modifiable_type}}</td>
                
                    <td>{{$modif->created_at}}</td>
                    <td>{{$modif->updated_at}}</td>
                    <td>
                    <div class="btn-group">
                        <a href="/admin/konfirmasi/{{$modif->id}}" type="submit" class="btn btn-warning">Konfirmasi</a>
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