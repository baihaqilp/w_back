@extends('layouts.app_investor')

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
                <li class="breadcrumb-item active">Ongkir </li>
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
                      <div class="row" style="padding:20px;">
                
                  <div class="col-2">
                  <div class="form-group">
                        <label>Status</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                        <label>Status Pembayaran</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                        <label>Pemesanan</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2" style="padding-top:30px;">
                        <button type="button" class="btn btn-primary" >FIlter</button>
                  </div>
                </div>
                      
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <table id="example" class="table table-responsive p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Id Daerah</th>
                        <th>Nama Daerah</th>
                        <th>Jarak /Km</th>
                        <th>Gudang</th>
                        <th>Ongkos Penerima</th>
                        <th>Ongkos Gudang</th>
                        <th>Total Ongkos</th>
                        <th>Pembulatan</th>
                        <th>Dibuat</th>
                        <th>Diubah</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($ongkir as $value)
                  <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->id_daerah}}</td>
                        <td>{{$value->nama_daerah}}</td>
                        <td>{{$value->jarak_km}}</td>
                        <td>{{$value->gudang}}</td>
                        <td>@currency($value->ongkos_penerima)</td>
                        <td>@currency($value->ongkos_gudang)</td>
                        <td>@currency($value->total_ongkos)</td>
                        <td>@currency($value->pembulatan)</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        
                    </tr>
                @endforeach
                  </tbody>
              </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection