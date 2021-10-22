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
    <div class="card-header">
      @if ($message = Session::get('success'))

          <div class="alert alert-success">

              <p>{{ $message }}</p>

          </div>

      @endif
    </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
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
                        <th>Anggota</th>
                        <th>Rantus</th>
                        <th>Korus</th>
                        <th>Created At</th>
                        <th>Updated At</th>

                    </tr>
                </thead>
                <tbody>
                @foreach($anggota as $index =>$value)
                  <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$value->name}}</td>
                        <td>{{$value->email}}</td>
                        <td>{{$value->phone}}</td>
                        <td>{{$value->jenis_kelamin}}</td>
                        <td>{{$value->No_anggota_umum}}</td>
                        <td>{{$value->kode_korus}}</td>
                        <td>
                        @switch($value->is_anggota)
                            @case(1)
                                <span class="badge badge-success">ANGGOTA</span>
                                @break
                            @default
                                <span class="badge badge-pill badge-warning">BUKAN ANGGOTA</span>
                        @endswitch
                        </td>
                        <td>
                        @switch($value->is_rantus)
                            @case(1)
                                <span class="badge badge-success">RANTUS</span>
                                @break
                            @default
                                <span class="badge badge-pill badge-warning">BUKAN RANTUS</span>
                        @endswitch
                        </td>
                        <td>
                        @switch($value->is_korus)
                            @case(1)
                                <span class="badge badge-success">KORUS</span>
                                @break
                            @default
                                <span class="badge badge-pill badge-warning">BUKAN KORUS</span>
                        @endswitch
                        </td>
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
    </section>
@endsection