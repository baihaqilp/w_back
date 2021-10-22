@extends('finance.layouts.app2')

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
                        <table id="user" class="table table-responsive p-0 table-striped table-bordered" style="width:100%; ">
                          <thead>
                              <tr>
                                  <th>ID</th>
                                  <th>Nama</th>
                                  <th>Email</th>
                                  <th>No HP</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Provinsi</th>
                                  <th>Kabupaten</th>
                                  <th>Kecamatan</th>
                                  <th>Desa</th>
                                  <th>Alamat Lengkap</th>
                                  <th>RT/RW</th>
                                  <th>Kode Pos</th>
                                  <!-- <th>PILIHAN</th> -->
                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                  <th>ID</th>
                                  <th>Nama</th>
                                  <th>Email</th>
                                  <th>No HP</th>
                                  <th>Jenis Kelamin</th>
                                  <th>Provinsi</th>
                                  <th>Kabupaten</th>
                                  <th>Kecamatan</th>
                                  <th>Desa</th>
                                  <th>Alamat Lengkap</th>
                                  <th>RT/RW</th>
                                  <th>Kode Pos</th>
                                  <!-- <th>PILIHAN</th> -->
                              </tr>
                          </tfoot>
                          <tbody>
                          @foreach($user as $value)
                            <tr>
                                  <td>{{$value->id}}</td>
                                  <td>{{$value->name}}</td>
                                  <td>{{$value->email}}</td>
                                  <td>{{$value->phone}}</td>
                                  <td>{{$value->jenis_kelamin}}</td>
                                  <td>{{$value->provinsi}}</td>
                                  <td>{{$value->kota}}</td>
                                  <td>{{$value->kecamatan}}</td>
                                  <td>{{$value->desa}}</td>
                                  <td>{{$value->alamat_lengkap}}</td>
                                  <td>{{$value->rt_rw}}</td>
                                  <td>{{$value->kode_pos}}</td>
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

@section('javascripts')
<script>
$(document).ready(function() {
     var table = $('#user').DataTable({
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
        ],
    });

    $("#user tfoot th").each( function ( i ) {
		
		if ($(this).text() !== '') {
	        var isStatusColumn = (($(this).text() == 'Status') ? true : false);
			var select = $('<select><option value=""></option></select>')
	            .appendTo( $(this).empty() )
	            .on( 'change', function () {
	                var val = $(this).val();
					
	                table.column( i )
	                    .search( val ? '^'+$(this).val()+'$' : val, true, false )
	                    .draw();
	            } );
	 		
			// Get the Status values a specific way since the status is a anchor/image
			if (isStatusColumn) {
				var statusItems = [];
				
                /* ### IS THERE A BETTER/SIMPLER WAY TO GET A UNIQUE ARRAY OF <TD> data-filter ATTRIBUTES? ### */
				table.column( i ).nodes().to$().each( function(d, j){
					var thisStatus = $(j).attr("data-filter");
					if($.inArray(thisStatus, statusItems) === -1) statusItems.push(thisStatus);
				} );
				
				statusItems.sort();
								
				$.each( statusItems, function(i, item){
				    select.append( '<option value="'+item+'">'+item+'</option>' );
				});

			}
            // All other non-Status columns (like the example)
			else {
				table.column( i ).data().unique().sort().each( function ( d, j ) {  
					select.append( '<option value="'+d+'">'+d+'</option>' );
		        } );	
			}
	        
		}
    } );

    $("#produk tfoot #test select").attr('disabled','disabled');
});
</script>
@endsection