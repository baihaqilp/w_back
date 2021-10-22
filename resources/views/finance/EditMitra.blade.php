@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Edit Mitra</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Mitra </li>
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
                      <form action="/finance/update_mitra/{{$mitras->id}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                       
                    </div>
                    <div class="card">
                    <div class="card-body">

                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" class="form-control" id="username" name="username" value="{{$mitras->username}}">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input  type="text" class="form-control" id="name" name="name" value="{{$mitras->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" class="form-control" id="email" name="email" value="{{$mitras->email}}">
                                </div>  
                                <div class="form-group">
                                    
                                    <input required type="hidden" class="form-control" id="password" name="password" value="{{$mitras->password}}">
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <br><img src="/img/foto_user/{{$mitras->foto}}" alt="" width="100px">
                                    <input required type="file" class="form-control" id="foto" name="foto" value="{{$mitras->foto}}">
                                </div>                             
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/finance/mitra" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>

        
    </section>
    
@endsection

