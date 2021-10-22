@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Ongkir</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Edit Ongkir </li>
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
                      <form action="/admin/update_ongkir/{{$ongkirs->id}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        
                    </div>
                    <div class="card">
                    <div class="card-body">
                       
                            <div class="card-body">
                            <div class="form-group">
                                    <label>Pilih Daerah</label>
                                    <select class="form-control" id="id_daerah" name="id_daerah">
                                    <option value="{{$ongkirs->id_daerah}}">{{$ongkirs->id_daerah}} || {{$ongkirs->nama_daerah}}</option>
                                    @foreach($desa as $values)
                                    <option value="{{$values->kode_desa}}">{{$values->kode_desa}} || {{$values->desa}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label >Gudang</label>
                                    <input type="text" class="form-control" id="gudang" name="gudang" value="{{$ongkirs->gudang}}" placeholder="gudang">
                                </div>
                                <div class="form-group">
                                    <label>Jarak Per KM</label>
                                    <input  required type="number" class="form-control" id="jarak_km" name="jarak_km" value="{{$ongkirs->jarak_km}}" placeholder="jarak/km">
                                </div>
                                <div class="form-group">
                                    <label>Ongkos Penerima</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "biaya_admin" id="biaya_admin" value="{{$ongkirs->biaya_admin}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Ongkos Gudang</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "biaya_distribusi" id="biaya_distribusi" value="{{$ongkirs->biaya_distribusi}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Total Ongkos</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input readonly type="text" class="form-control" name = "biaya_admin_final"id="biaya_admin_final" value="{{$ongkirs->biaya_admin_final}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/admin/ongkir" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        <button onclick="calculate()">Hitung</button>
                    </div>
                    </div>
                   
                </div>
        </div>
        <script src="{{ url('../AdminLTE/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ url('../AdminLTE/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>

            function calculate(){
                var biaya_admin,biaya_distribusi,biaya_admin_final;
                
                biaya_admin = parseFloat($('#biaya_admin').val());
                biaya_distribusi = parseFloat($('#biaya_distribusi').val());
                biaya_admin_final = biaya_admin + biaya_distribusi;
                
                var totalongkosObj = document.getElementById('biaya_admin_final');
                totalongkosObj.value = biaya_admin_final;
               
        }
        </script>
    </section>
    
@endsection

