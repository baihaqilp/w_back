@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Komponen Harga</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Komponen Harga </li>
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

          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Komponen Harga</h3>

                @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                @endif
              </div>
              
              <!-- Modal -->
              
              <div class="card-body">
              <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama Produk</th>
                        <th>Total COGS</th>
                        <th>COGS per Barang</th>
                        <th>margin</th>
                        <th>Harga Jual</th>
                        <th>Nama Gambar</th>
                        <th>Gambar</th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php ?>
                @foreach($harga as $komponen)
                  <tr>
                        <td>
                        </td>
                        <td>{{$komponen->id}}</td>
                        <td>{{$komponen->nama_produk}}</td>
                        <td>@currency($komponen->total_cogs)</td>
                        <td>@currency($komponen->cogs_satuan)</td>
                        <td>@currency($komponen->margin)</td>
                        <td>@currency($komponen->harga_jual_final)</td>
                        <td>{{$komponen->image}}</td>
                        <td><img src="/img/produk/{{ $komponen->image}}" alt="" width="80px"></td>
                        
                    </tr>
                    @endforeach
                  </tbody>
              </table>  
              
            </div>

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    
   
<!-- page script -->
    
@endsection