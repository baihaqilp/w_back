@extends('finance.layouts.app2')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Produk</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Produk </li>
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
                      @if ($message = Session::get('success'))

                  <div class="alert alert-success">

                      <p>{{ $message }}</p>

                  </div>

                @endif
                @if ($message = Session::get('tampil_success'))

                  <div class="alert alert-success">

                      <p>{{ $message }}</p>

                  </div>

                @endif
                @if ($message = Session::get('hide_success'))

                  <div class="alert alert-success">

                      <p>{{ $message }}</p>

                  </div>

                @endif
                </div>
                      
                    <div class="card-body">
                    <a href="/finance/tambah_produk" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style ="float:right; font-size:15px;">Tambah Produk</a>
                        <div class="card-body ">
                        <table id="produk" class="table table-responsive p-0 table-striped table-bordered" style="width:100%; ">
                        <thead>
                    <tr>
                        <th >ID</th>
                        <th>Gambar</th>
                        <th>Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Kemasan</th>
                        <th>COGS</th>
                        <th>Margin</th>
                        <th>Harga </th>
                        <th>Pajak</th>
                        <th>Harga Final</th>
                        <th>Visibilitas</th>
                        <th>PILIHAN</th>       
                    </tr>
                </thead>
                <tfoot>
                <tr>
                        <th>ID</th>
                        <th id="test">Gambar</th>
                        <th >Produk</th>
                        <th>Kategori</th>
                        <th>Deskripsi</th>
                        <th>Alamat</th>
                        <th>Kemasan</th>
                        <th>COGS</th>
                        <th>Margin</th>
                        <th>Harga </th>
                        <th>Pajak</th>
                        <th>Harga Final</th>      
                    </tr>
                </tfoot>
                <tbody>
                  @foreach($produks as $produk)
                  <tr>
                        <td>{{$produk->id}}</td>
                        <td> <?php foreach (json_decode($produk->image)as $picture) { ?>
                              <img src="{{ asset('/img/produk/'.$picture) }}" style="height:120px; width:200px"/>
                              <?php } ?>
                        </td>
                        <td>{{$produk->nama_produk}}</td>
                        <td>{{$produk->nama_kategori}}</td>
                        <td>{{$produk->deskripsi}}</td>
                        <td>{{$produk->alamat}}</td>
                        <td>{{$produk->kemasan}}</td>
                        <td>@currency($produk->total_cogs)</td>
                        <td>@currency($produk->margin)</td>
                        <td>@currency($produk->harga_jual_1)</td>
                        <td>{{$produk->pajak*100}}%</td>
                        <td>@currency($produk->harga_jual_final)</td>
                        <td>
                        <span class="badge badge-success">
                        @switch($produk->visibilitas)
                          @case(1)
                              Ditampilkan
                              @break
                          @default
                              Tidak Tampil
                              @break
                        @endswitch
                        </span>

                        </td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Pilih satu opsi
                          </button>
                          <div class="dropdown-menu">
                            @switch($produk->visibilitas)
                              @case(1)
                                  <a class="dropdown-item" href="/finance/produk/hide/{{$produk->id}}">Sembunyikan Produk</a>
                                  @break
                              @default
                                  <a class="dropdown-item" href="/finance/produk/tampil/{{$produk->id}}">Tampilkan Produk</a>
                            @endswitch
                            <a class="dropdown-item" href="/finance/view_tambah_gambar_produk/{{$produk->id}}">Tambah Gambar</a>
                            <a class="dropdown-item" href="/finance/view_update_produk/{{$produk->id}}">Edit</a>
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
     var table = $('#produk').DataTable({
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
        ],
    });

    $("#produk tfoot th").each( function ( i ) {
		
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