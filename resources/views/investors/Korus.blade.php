@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Data Korus</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Korus </li>
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
                      <form action="/admin/anggota/korus/angkat/{{$data->id}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        
                   
                    <div class="card">
                    <div class="card-body">
    
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="{{$data->name}}" value="{{$data->name}}"disabled>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Rantus</label>
                                    <select class="form-control" id="rantus" name="rantus" required>
                                    <option value="">Pilih Rantus</option>
                                    @foreach($rantus as $value)
                                      <option value="{{$value->no_rantus}}">{{$value->name}} || {{$value->no_rantus}} || {{$value->area}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label >AREA</label>
                                    <select name="kecamatan" class="form-control" id="kecamatan"  required>
                                    <option value="">Pilih Kecamatan</option>
                                    @foreach($kecamatan as $value)
                                      <option value="{{$value->kode_kecamatan}}">{{$value->kecamatan}}</option>
                                    @endforeach
                                    </select>
                                    <select name="desa" class="form-control" id="desa"  required style="margin-top:15px;">
                                    <option value="">Pilih Desa</option>
                                    </select>
                                </div>                            
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/admin/input_berita" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        
                    </div>
                    </div>
                   
                </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">

$(document).ready(function() {

    $('select[name="kecamatan"]').on('change', function() {

        var kode_desa = $(this).val();

        if(kode_desa) {

            $.ajax({

                url: '/desa/'+kode_desa,

                type: "GET",

                dataType: "json",

                success:function(data) {
        
                    $('select[name="desa"]').empty();

                    $.each(data, function(key, value) {

                        $('select[name="desa"]').append('<option value="'+ key +'">'+ value +'</option>');

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

