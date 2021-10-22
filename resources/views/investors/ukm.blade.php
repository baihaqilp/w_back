@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">UKM</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">UKM </li>
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
                        <div class="card-body">
                        <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Usaha atau Perusahaan</th>
                        <th>Nomor KTP</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Alamat Utama Usaha</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($ukm as $value)
                  <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->nama_usaha}}</td>
                        <td>{{$value->no_ktp_pj}}</td>
                        <td>{{$value->nama_lengkap}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->alamat_usaha_utama}}</td>
                    </tr>
                @endforeach
                  </tbody>
              </table>  
                        </div>
                    </div>
                </div>
        </div>
    </section>
@endsection