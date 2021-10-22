@extends('layouts.app_investor')

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
                  @if ($message = Session::get('success'))

                    <div class="alert alert-success">

                        <p>{{ $message }}</p>

                    </div>

                  @endif
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                    
                      <!-- select -->
                  <div class="row" style="padding:20px;">
                  <div class="col-2">
                  <div class="form-group">
                        <label>Kategori</label>
                        <select class="form-control">
                          <option value="">-- Pilih Kategori --</option>
                          @foreach($kategoris as $kategori)
                          <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                          @endforeach
                        </select>
                      </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                        <label>Sub Kategori</label>
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                        <label>Pemesanan</label>
                        <input type="text" class="form-control col-sm-12">
                      </div>
                  </div>
                  <div class="col-2" style="padding-top:30px;">
                        <button type="button" class="btn btn-primary" >FIlter</button>
                  </div>
                </div>
                      
                    <div class="card-body">
                    
                    <a href="/admin/tambah_produk" class="btn btn-success btn-lg active" role="button" aria-pressed="true" style ="float:right; font-size:15px;">Tambah Produk</a>
                <div class="card-body table-responsive p-0">
                <table id="example" class="table table-responsive-s p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
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
                      
                     
                    </tr>
                </thead>
                <tbody>
                  @foreach($produks as $produk)
                  <tr>
                        <td>{{$produk->id}}</td>
                        <td><img src="/img/produk/{{ $produk->image}}" alt="" width="100px"></td>
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