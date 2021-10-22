@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Anggota</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Anggota </li>
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
                          <option>Anggota Umum</option>
                          <option>Anggota Koperasi</option>
                          <option>Korus</option>
                          <option>Rantus</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                        <label>Tanggal</label>
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
                        <div class="card-body">
                        <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No HP</th>
                        <th>Jenis Kelamin</th>
                        <th>No Anggota Umum</th>
                        <th>Kode Korus</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($user as $value)
                  <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->jenis_kelamin}}</td>
                        <td>{{$value->No_anggota_umum}}</td>
                        <td>{{$value->kode_korus}}</td>
                        <!-- <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Edit</a>
                            <a class="dropdown-item" href="#">Delete</a>
                          </div>
                        </div>
                        </td> -->
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