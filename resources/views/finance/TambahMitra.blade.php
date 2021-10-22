@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Tambah Mitra</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Tambah Mitra </li>
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
                      <form action="/finance/input_mitra" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                       
                    </div>
                    <div class="card">
                    <div class="card-body">
    
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Username</label>
                                    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input  type="text" class="form-control" id="name" name="name" placeholder="Nama">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required type="email" class="form-control" id="email" name="email" placeholder="Email">
                                </div>  
                                <div class="form-group">
                                    <label>Password</label>
                                    <input required type="text" class="form-control" id="password" name="password" placeholder="Password">
                                </div> 
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input required type="file" class="form-control" id="foto" name="foto" placeholder="Password">
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

