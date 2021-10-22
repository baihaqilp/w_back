@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pesanan</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Pesanan </li>
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
                      <form action="" method="get">
                      <div class="row input-datarange" style="padding:20px;">
                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal Awal</label>
                            <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" value="{{$tanggal_awal}}">
                            </div>
                      </div>
                      <div class="col-sm-2">
                            <div class="form-group">
                              <label>Tanggal Akhir</label>
                            <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" value="{{$tanggal_akhir}}">
                            </div>
                      </div>

                
                  <div class="col-sm-3" style="padding-top:30px;">
                        <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" >Filter</button>
                        <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" onclick='window.location.reload();' >Refresh</button>
                        
                  </div>
                      </form>
                </div>
                      
                    <div class="card-body">
                    <a href="/admin/edit_pesanan" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style ="float:right; font-size:15px;">Tambah Pesanan</a>
                        <div class="card-body ">
                        <table id="exampless" class="table table-responsive p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>no_pesanan</th>
                        <th>Tanggal Pesanan</th>
                        <th>Jam</th>
                        <th>Nama Penerima</th>
                        <th>Nama Produk</th>
                        <th>Kode Korus</th>
                        <th>Kode Rantus</th>
                        <th>Id Produk</th>
                        <th>Harga Produk</th>
                        <th>Metode Pembayaran</th>
                        <th>Kode Promo</th>
                        <th>Detail Pembayaran</th>
                        <th>Summary Pesanan</th>
                        <th>Summary Ongkir</th>
                        <th>Total Pembayaran</th>
                        <th>Komisi Korus</th>
                        <th>Komisi Rantus</th>
                        <th>Status Pesanan</th>
                        <th>Created At</th>    
                        <th>Update At</th>
                        <th>Action</th>     
                      </tr>
                </thead>
                <tbody>
                @foreach($pesanan as $value)
                  <tr>
                        <td>{{$value->id}}</td>
                        <td>{{$value->no_pesanan}}</td>
                        <td>{{$value->tanggal_pesanan}}</td>
                        <td>{{$value->jam}}</td>
                        <td>{{$value->penerima}}</td>
                        <td>{{$value->nama_produk}}</td>
                        <td>{{$value->no_rantus}}</td>
                        <td>{{$value->no_korus}}</td>
                        <td>{{$value->id_produk}}</td>
                        <td>@currency($value->harga_produk)</td>
                        <td>{{$value->metode_pembayaran}}</td>
                        <td>{{$value->kode_promo}}</td>
                        <td>{{$value->detail_pembayaran}}</td>
                        <td>{{$value->summary_pesanan}}</td>
                        <td>@currency($value->summary_ongkir)</td>
                        <td>@currency($value->total_pembayaran)</td>
                        <td>@currency($value->komisi_korus)</td>
                        <td>@currency($value->komisi_rantus)</td>
                        <td>
                        @switch($value->status_pesanan)
                            @case(1)
                                <span class="badge badge-success">Dikonfirmasi Korus</span>
                                @break

                            @case(2)
                                <span class="badge badge-info">Keluar Rantus</span>
                                @break
                            
                            @case(3)
                                <span class="badge badge-info">Diterima Korus</span>
                                @break
                            
                            @case(4)
                                <span class="badge badge-info">Diterima anggota</span>
                                @break
                            
                            @case(5)
                                <span class="badge badge-warning">Pembayaran Selesai</span>
                                @break
                            
                            @case(6)
                                <span class="badge badge-primary">Menunggu Setoran</span>
                                @break
                            
                            @case(7)
                                <span class="badge badge-success">Pesanan Selesai</span>
                                @break

                            @case(8)
                                <span class="badge badge-danger">Pesanan Ditolak</span>
                                @break

                            @default
                                <span class="badge badge-pill badge-warning">Menunggu Konfirmasi</span>
                        @endswitch
                        </td>
                        <td>{{$value->created_at}}</td>
                        <td>{{$value->updated_at}}</td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Edit</a>
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
            </div>
        </div>
    </section>
@endsection

@section('javascripts')
<script>
$(document).ready(function() {
    $('#exampless').DataTable({
      "autoWidth" : true,
      "ordering": false,
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
        ],

        
    });
});
</script>
@endsection