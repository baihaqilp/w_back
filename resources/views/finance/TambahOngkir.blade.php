@extends('finance.layouts.app2')

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
                <li class="breadcrumb-item active">Tambah Ongkir </li>
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
                      <form action="/finance/input_ongkir" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        
                    </div>
                    <div class="card">
                    <div class="card-body">
                       
                            <div class="card-body">
                            <div class="form-group">
                                    <label>Pilih Daerah</label>
                                    <select class="form-control" id="id_daerah" name="id_daerah">
                                    <option value="">Pilih Daerah</option>
                                    @foreach($daerah as $value)
                                    <option value="{{$value->kode_desa}}">{{$value->kode_desa}} || {{$value->desa}}</option>
                                    @endforeach
                                    </select>
                                    
                                </div>
                                <div class="form-group">
                                    <label >Gudang</label>
                                    <input type="text" class="form-control" id="gudang" name="gudang" placeholder="gudang">
                                </div>
                                <div class="form-group">
                                    <label>Jarak Per KM</label>
                                    <input  required type="number" class="form-control" id="jarak_km" name="jarak_km" placeholder="jarak/km">
                                </div>
                                <div class="form-group">
                                    <label>Biaya</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "biaya_km"id="biaya_km">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>KM Berikutnya </label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "km_berikutnya"id="km_berikutnya">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya Admin</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "biaya_admin"id="biaya_admin">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya Distribusi</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "biaya_distribusi" id="biaya_distribusi" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Biaya Admin Final</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  type="text" class="form-control" name = "biaya_admin_final" id="biaya_admin_final" readonly>
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/finance/tambah_ongkir" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
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
                var totalbiayakm,biaya_admin,biaya_admin_final,jarak_km,biaya_km,km_berikutnya,distribusi;
                
                biaya_admin = parseFloat($('#biaya_admin').val());
                jarak_km = parseFloat($('#jarak_km').val());
                biaya_km = parseFloat($('#biaya_km').val());
                km_berikutnya = parseFloat($('#km_berikutnya').val());
                if(jarak_km <= 5){
                    var distribusi = document.getElementById('biaya_distribusi');
                    distribusi.value = biaya_km;
                }else if(jarak_km >= 5){
                    var distribusi = document.getElementById('biaya_distribusi');
                    distribusi.value = biaya_km+(km_berikutnya*(jarak_km-5));
                }
                distribusi = parseFloat($('#biaya_distribusi').val());
                
                var final = document.getElementById('biaya_admin_final');
                final.value = biaya_admin + distribusi;      
        }
        </script>
    </section>
    
@endsection

