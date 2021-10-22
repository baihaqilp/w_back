@extends('layouts.app2')

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
                <form action="" method="get">
                    <div class="card">
                    <div class="row input-datarange" style="padding:20px;">
                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal">
                            </div>
                      </div>
                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir">
                            </div>
                      </div>
          
                
                  <div class="col-sm-3" style="padding-top:30px;">
                        <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" >Filter</button>
                        <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" onclick='window.location.reload();' >Refresh</button>
                  </div>
                  </form>
                </div>
                        <div class="card-body">
                        <table id="examples-ukm" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Usaha atau Perusahaan</th>
                        <th>Nomor KTP</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Alamat Utama Usaha</th>
                        <th>PILIHAN</th>

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
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/detail_ukm/{{$value->id}}">Detail</a>
                            <a class="dropdown-item" href="/admin/view_update_ukm/{{$value->id}}">Edit</a>
                            <a class="dropdown-item" href="/admin/delete_ukm/{{$value->id}}">Delete</a>
                          </div>
                        </div>
                        </td>
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
@section('javascripts')
<script>
$(document).ready(function() {
    $('#examples-ukm').DataTable({
      "autoWidth" : true,
      dom: 'lBfrtip',
        buttons: [
            {
                extend: 'copyHtml5',
            },
            {
                extend: 'csvHtml5',
                exportOptions: {
                  columns: [ 0, ':visible' ]
                },
                orientation: 'landscape',
                pageSize: 'A3'
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: [ ':visible' ]
                },
                orientation: 'landscape',
                pageSize: 'A3'
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: [':visible' ]
                },
                orientation: 'landscape',
                pageSize: 'A3'
            },
            'colvis'
        ]
    });
});
</script>
@endsection