@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Tambah Gambar</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Produk</a></li>
                <li class="breadcrumb-item active">Tambah Gambar </li>
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
                      <form action="/finance/tambah_gambar_produk/{{$produk['id']}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                       
                    </div>
                    <div class="card">
                    <div class="card-body">

                        
                            <div class="card-body">
                            <div class="form-group">
                                <label >Gambar Produk</label>
                                <div class="input-group control-group increment">
                                    <input type="file" name="image[]" id="image" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-info" type="button" ><i class="glyphicon glyphicon-plus"></i>Add</button>
                                </div> 
                                <div class="clone" hidden>    
                            <div class="control-group input-group" style="margin-top:10px">
                                <input type="file" name="image[]" id="image" class="form-control">
                                <div class="input-group-btn">
                                    <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i>Remove</button>
                                </div>
                            </div>
                        </div>                     
                                
                            </div>
                            <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/finance/produk" class="btn btn-secondary btn-lg " role="button" style ="float:right;padding top:20px;">Cancel</a>
                            
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>

        
    </section>
    
@endsection

