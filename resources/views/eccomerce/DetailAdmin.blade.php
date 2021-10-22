@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Detail Admin</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Detail Admin </li>
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
                      <form action="/admin/update_admin/{{$admins->id}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                       
                    </div>
                    <div class="card">
                    <div class="card-body">

                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Username</label>
                                    <a class="float-right">{{$admins->username}}</a>
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <a class="float-right">{{$admins->name}}</a>                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <a class="float-right">{{$admins->email}}</a>  
                                </div>  
                                <div class="form-group">
                                    
                                    <input required type="hidden" class="form-control" id="password" name="password" value="{{$admins->password}}">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <br><img class="float-right" src="/img/foto_user/{{$admins->foto}}" alt="" width="250px">                                </div>                             
                                </div>
                                <a href="/admin/admin" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>

        
    </section>
    
@endsection

