@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Admin </li>
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
                <h3 class="card-title">Admin</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              
              <!-- Modal -->

              <div class="card-body">
              <div class="box-tools pull-right" style="float:right;">
  
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
                    </tr>
                </thead>
                <tbody>
                <?php ?>
                @foreach($admins as $admin)
                  <tr>
                      <td>{{$admin->id}}</td>
                      <td>{{$admin->username}}</td>
                      <td>{{$admin->name}}</td>
                      <td>{{$admin->email}}</td>
                      <td><img src="/img/foto_user/{{$admin->foto}}" alt="" width="100px"></td>
                      <td>{{$admin->created_at}}</td>
                      <td>{{$admin->updated_at}}</td>
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