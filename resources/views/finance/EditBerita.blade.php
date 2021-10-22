@extends('finance.layouts.app2')

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
                <li class="breadcrumb-item active">Tambah Berita </li>
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
                      <form action="/finaance/input_berita" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        <div class="card-body">                
                            <div class="card-header">
                                <h3 class="card-title"><b> Gambar</b></h3>
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control" id="gambar_berita" name="gambar_berita" value="{{$beritas->gambar_berita}}">
                            </div>
                        </div>
                    </div>
                    <div class="card">
                    <div class="card-body">
    
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Judul Berita</label>
                                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="{{$beritas->judul_berita}}">
                                </div>
                                
                                <div class="form-group">
                                    <label>Isi</label>
                                    <div class="mb-3">
                                        <textarea  required id="isi" name="isi" class="textarea" value="{{$beritas->isi}}" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{$beritas->isi}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>link</label>
                                    <input  required type="text" class="form-control" id="link" name="link" value="{{$beritas->link}}">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal</label>
                                    <input required type="date" class="form-control" id="tanggal_berita" name="tanggal berita" value="{{$beritas->tanggal_berita}}">
                                </div>                              
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/finance/berita" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>

        
    </section>
    
@endsection

