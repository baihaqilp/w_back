@extends('layouts.app2')

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
                      <div class="row" style="padding:20px;">
                  <div class="col-2">
                  <div class="form-group">
                        <label>Menunjukkan</label>
                        <select class="form-control">
                          <option>10</option>
                          <option>20</option>
                          <option>30</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2">
                  <div class="form-group">
                        <label>Status</label>
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
                        <label>Status Pembayaran</label>
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
                        <select class="form-control">
                          <option>option 1</option>
                          <option>option 2</option>
                          <option>option 3</option>
                          <option>option 4</option>
                          <option>option 5</option>
                        </select>
                      </div>
                  </div>
                  <div class="col-2" style="padding-top:30px;">
                        <button type="button" class="btn btn-primary" >FIlter</button>
                  </div>
                </div>
                      
                    <div class="card-body">
                        <div class="card-body table-responsive p-0">
                        <table id="example" class="table table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th></th>
                        <th>ID</th>
                        <th>Nama Kategori</th>
                        <th>Kategori Produk</th>
                        <th>Urutan</th>
                        <th>Visibilitas</th>
                        <th>Tampilkan di Beranda</th>
                        <th>Pilihan</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                        <td>
                        </td>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
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
                  </tbody>
              </table>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection