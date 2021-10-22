@extends('layouts.app_investor')

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

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Mitra</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              
              <!-- Modal -->

              <div class="card-body">
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