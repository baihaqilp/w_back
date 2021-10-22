@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Rantus</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Rantus </li>
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
                   
                      <!-- select -->
                      <form action="/admin/anggota/rantus/angkat/{{$data->id}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        
                   
                    <div class="card">
                    <div class="card-body">
    
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="{{$data->name}}" value="{{$data->name}}"disabled>
                                </div>
                                <div class="form-group">
                                    <label >AREA</label>
                                    <select name="kota" class="form-control" id="kota"  required>
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach($kota as $value)
                                      <option value="{{$value->kode_kota}}">{{$value->kota}}</option>
                                    @endforeach
                                    </select>
                                    <select name="kecamatan" class="form-control" id="kecamatan"  required style="margin-top:15px;">
                                    <option value="">Pilih Kecamatan</option>
                                    </select>
                                </div>                             
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/anggota/rantus/delete/{id}" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">

        $(document).ready(function() {

            $('select[name="kota"]').on('change', function() {

                var kode_desa = $(this).val();

                if(kode_desa) {

                    $.ajax({

                        url: '/kecamatan/'+kode_desa,

                        type: "GET",

                        dataType: "json",

                        success:function(data) {


                            

                            $('select[name="kecamatan"]').empty();

                            $.each(data, function(key, value) {

                                $('select[name="kecamatan"]').append('<option value="'+ key +'">'+ value +'</option>');

                            });


                        }

                    });

                }else{

                    $('select[name="desa"]').empty();

                }

            });

        });

        </script>

        
    </section>
    
@endsection

