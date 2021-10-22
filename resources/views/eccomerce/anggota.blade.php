@extends('layouts.app2')

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
    
    <div class="modal fade" id="tambah-anggota" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('kategori.create')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="form-group">
                        <label for="nama_kategori" class="col-form-label">Nama</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                      </div>
                      <div class="form-group">
                        <label for="kategori_produk" class="col-form-label">Rantus</label>
                        <!--<textarea class="form-control" id="kategori_produk" name="kategori_induk"></textarea>-->
                        <input type="text" class="form-control" id="kategori_induk" name="kategori_induk">
                      </div>
                      <div class="form-group">
                        <label for="nama_kategori" class="col-form-label">Area</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
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
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    <form action="" method="get">
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
                      </form>
                
                  <div class="col-sm-3" style="padding-top:30px;">
                        <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" >Filter</button>
                        <button type="text" name="btn-filter" id="btn-filter" class="btn btn-primary" onclick='window.location.reload();' >Refresh</button>
                  </div>
                </div>
                        <div class="card-body">
                        <table id="examples-anggota" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
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
                        <th>PILIHAN</th>

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
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            @switch($value->is_korus)
                              @case(1)
                                  <a class="dropdown-item" href="/admin/anggota/korus/hapus/{{$value->id}}">HAPUS KORUS</a>
                                  @break
                              @default
                                  <a class="dropdown-item" href="/admin/anggota/korus/{{$value->id}}">ANGKAT KORUS</a>
                            @endswitch
                            @switch($value->is_rantus)
                              @case(1)
                                  <a class="dropdown-item" href="/admin/anggota/rantus/hapus/{{$value->id}}">HAPUS RANTUS</a>
                                  @break
                              @default
                                  <a class="dropdown-item" href="/admin/anggota/rantus/{{$value->id}}">ANGKAT RANTUS</a>
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
                </div>
        </div>
    </section>
@endsection

@section('javascripts')
<script>
$(document).ready(function() {
    $('#examples-anggota').DataTable({
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
                    columns: [ 0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21 ]
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