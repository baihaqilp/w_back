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
                      <!-- select -->
                      
                      
                    <div class="card-body">
                        <a href="/admin/view_ongkir" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style ="float:right; font-size:15px;">Tambah Data</a>
                        <div class="card-body table-responsive p-0">
                        <table id="ongkir-table" class="table table-responsive-l p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Id Daerah</th>
                        <th>Nama Daerah</th>
                        <th>Jarak /Km</th>
                        <th>Gudang</th>
                        <th>Biaya KM</th>
                        <th>KM Selanjutnya</th>
                        <th>Biaya Admin</th>
                        <th>Biaya Distribusi</th>
                        <th>Biaya Admin Final</th>
                        <th>Dibuat</th>
                        <th>Diubah</th>
                        <th>Action</th>
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
                        <td>@currency($value->biaya_km)</td>
                        <td>@currency($value->km_selanjutnya)</td>
                        <td>@currency($value->biaya_admin)</td>
                        <td>@currency($value->biaya_distribusi)</td>
                        <td>@currency($value->biaya_admin_final)</td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="/admin/view_edit_ongkir/{{$value->id}}">Edit</a>
                            <a class="dropdown-item" href="/admin/delete_ongkir/{{$value->id}}">Delete</a>
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
        </div>
    </section>
@endsection
@section('javascripts')
<script>
$(document).ready(function() {
    $('#ongkir-table').DataTable({
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
                    columns: [ ':visible']
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