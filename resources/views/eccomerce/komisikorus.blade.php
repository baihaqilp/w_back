@extends('layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Komisi Korus</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Komisi Korus </li>
              </ol>
              
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        <div class="row">
          <div class="col-12">
          <form action="" method="get">
          <div class="card">
              
              <div class="card-header">
                <h3 class="card-title"> Komisi Korus</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
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
                </div>
              <!-- Modal -->
              <div class="modal fade" id="tambah-banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Banner</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('banner.input')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label class="col-form-label">Upload Gambar</label>
                        <input type="file" class="form-control" id="banner" name="banner">
                      </div>
                      
                      <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                    </div>
                    
                  </div>
                </div>
              </div>

              <div class="card-body">
              <div class="box-tools pull-right" style="float:right;">
             <!-- Button trigger modal 
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#tambah-banner">
                Tambah Banner
              </button>-->
              </div>
              <div class="card-body table-responsive p-0">
              <table id="examples-komisikorus" class="table table-responsive-m p-0 table-striped table-bordered" style="width:100%;">
              <thead>
                    <tr>
                        <th>Id</th>
                        <th>Id Korus</th>
                        <th>Nama Korus</th>
                        <th>No Pesanan</th>
                        <th>Tangal Pesanan</th>
                        <th>Komisi Pesanan</th>
                        <th>Status Pembayaran</th>
                        <th>Tanggal Dibayar</th>
                        <th>action</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $index =>$value)
                  <tr>
                        <td>{{$index+1}}</td>
                        <td>{{$value->id_korus}}</td>
                        <td>{{$value->nama_korus}}</td>
                        <td>{{$value->no_pesanan}}</td>
                        <td>{{$value->tangal_pesanan}}</td>
                        <td>{{$value->komisi_pesanan}}</td>
                        <td>
                        @switch($value->is_bayar)
                            @case(1)
                                <span class="badge badge-success">Terbayar</span>
                                @break
                            @default
                                <span class="badge badge-pill badge-warning">Belum Dibayarkan</span>
                        @endswitch
                        </td>
                        <td>{{$value->tanggal_pembayaran}}</td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            @switch($value->is_bayar)
                              @case(1)
                                  <a class="dropdown-item" href="/admin/anggota/korus_komisi/{{$value->id}}" disabled>Bayar</a>
                                  @break
                              @default
                                  <a class="dropdown-item" href="/admin/anggota/korus_komisi/{{$value->id}}">Bayar</a>
                            @endswitch
                            <a class="dropdown-item" href="#">Delete</a>
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
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    
   
<!-- page script -->
    
@endsection
@section('javascripts')
<script>
$(document).ready(function() {
    $('#examples-komisikorus').DataTable({
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
                    columns: [ ':visible' ]
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

                