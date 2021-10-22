@extends('finance.layouts.app2')

@section('content')

    <!-- Main content -->
    <section class="content">
    <div class="container-fluid">
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
                <li class="breadcrumb-item active">Edit Produk </li>
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
                      <form action="/finance/update_produk/{{$produk['id']}}" method="POST" enctype="multipart/form-data" role="form">
                      @csrf
                        <!--<div class="card-body">                
                            <div class="card-header">
                                <h3 class="card-title"><b> Gambar</b></h3>
                            </div>
                            <div class="form-group">
                                    <input type="file" class="form-control" id="image" name="image" placeholder="image">
                            </div>
                        </div>-->
                    </div>
                    <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="card-title"><b>Detail</b></h3>
                        </div>
                        
                            <div class="card-body">
                                <div class="form-group">
                                    <label >Nama_produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Nama Produk" value="{{$produk['nama_produk']}}">
                                </div>
                                <div class="form-group">
                                    <label>Pilih Kategori</label>
                                    <select class="form-control" id="id_kategori" name="id_kategori" value="{{$produk['id_kategori']}}" required>
                                    <?php ?>
                                    <option value="{{$produk_kategori['id']}}">{{$produk_kategori['nama_kategori']}}</option>
                                    <?php ?>
                                    @foreach($kategoris as $kategori)
                                    <option value="{{$kategori->id}}">{{$kategori->nama_kategori}}</option>
                                    @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <!-- <div class="row"style="padding:10px;">
                                        <button type="button" class="btn btn-warning" ><i class="fas fa-image"></i></i> Menambahkan iframe</button>
                                    </div>
                                     -->
                                    <div class="mb-3">
                                        <textarea id="deskripsi" name="deskripsi" class="textarea" placeholder="Place some text here" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                        {{$produk['deskripsi']}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input  required type="text" class="form-control" id="alamat" name="alamat" value="{{$produk['alamat']}}" placeholder="Alamat">
                                </div>
                                <div class="form-group">
                                    <label>Kemasan</label>
                                    <input required type="text" class="form-control" id="kemasan" name="kemasan" value="{{$produk['kemasan']}}" placeholder="Kemasan">
                                </div>
                                <div class="form-group">
                                    <label>Biaya Pengiriman</label>
                                    <div class="input-group col-sm-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input  required type="text" class="form-control" name = "biaya_kirim"id="biaya_kirim" value="{{$produk['biaya_kirim']}}">
                                    <div class="input-group-append">
                                        <span class="input-group-text">.00</span>
                                    </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Komponen Harga</label>
                                        <table class="table">
                                            <tr>
                                                <td><p>Kuantitas Pembelian</p></td>
                                                <td><input type="number" id="kuantitas_beli" name ="kuantitas_beli" value="{{$produk['kuantitas_beli']}}" class="form-control col-sm-3"></td>
                                            </tr>
                                            <tr>
                                                <td><p>Harga Pembelian Pabrik</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" name="harga_beli_pabrik" id="harga_beli_pabrik" value="{{$produk['harga_pabrik']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Biaya Pengiriman dari Pabrik ke Gudang Utama</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" name="biaya_kirim_pabrik" id="biaya_kirim_pabrik" value="{{$produk['biaya_kirim_gudang_utama']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Biaya Pengiriman dari Gudang Utama ke Gudang Kecamatan</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" name="biaya_kirim_gudang" id="biaya_kirim_gudang" value="{{$produk['biaya_kirim_gudang_kec']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Biaya Bongkar di Pabrik</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" name="biaya_bongkar_pabrik" id="biaya_bongkar_pabrik" value="{{$produk['biaya_bongkar_pabrik']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Biaya Bongkar di Gudang</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" name="biaya_bongkar_gudang" id="biaya_bongkar_gudang" value="{{$produk['biaya_bongkar_gudang']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Overhead</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" name="overhead" id="overhead" value="{{$produk['overhead']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Total COGS</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input readonly type="text" class="form-control col-sm-3" name="total_cogs" id="total_cogs" value="{{$produk['total_cogs']}}">
                                                </div>
                                                </td>
                                            </tr>-->
                                            <tr>
                                                <td><label>COGS per satuan barang</label></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input readonly type="text" class="form-control col-sm-3" id="cogs_satuan" name="cogs_satuan" value="{{$produk['cogs_satuan']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Margin per barang</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" id="margin" name="margin" value="{{$produk['margin']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Harga</label></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input readonly type="text" class="form-control col-sm-3" id="harga_jual_1" name="harga_jual_1" value="{{$produk['harga_jual_1']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><p>Pajak</p></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">%</span>
                                                </div>
                                                <input type="text" class="form-control col-sm-3" id="pajak" name="pajak" value="{{$produk['pajak']}}">
                                                </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td><label>Harga Jual</label></td>
                                                <td>
                                                <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text">Rp.</span>
                                                </div>
                                                <input readonly type="text" class="form-control col-sm-3" id="harga_jual_final" name="harga_jual_final" value="{{$produk['harga_jual_final']}}" >
                                                </div>
                                                </td>
                                            </tr>
                                        </table>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Variasi</label>
                                    <p>Tambahkan opsi yang tersedia seperti warna atau ukuran yang dapat di pilih pembeli saat checkout</p>
                                    <div class="row" style="padding:10px;">
                                        <button type="button" class="btn btn-dark"  >Tambahkan Variasi</button>
                                        <button type="button" class="btn btn-dark" >Pilih Variasi yang Ada</button>
                                    </div>
                                </div> -->
                                
                                <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="/finance/produk" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>
                            </div>
                        </form>
                        <button onclick="calculate()">Hitung</button>
                    </div>
                    </div>
                   
                </div>
        </div>

        <script>
            function calculate(){
                var beli_pabrik,kirim_pabrik,kirim_gudang,bongkar_pabrik,kuantitas;
                var bongkar_gudang,overhead,totalcogs,margin,pajak;


                beli_pabrik = parseFloat($('#harga_beli_pabrik').val());
                kirim_pabrik = parseFloat($('#biaya_kirim_pabrik').val());
                kirim_gudang = parseFloat($('#biaya_kirim_gudang').val());
                bongkar_pabrik = parseFloat($('#biaya_bongkar_pabrik').val());
                bongkar_gudang = parseFloat($('#biaya_bongkar_gudang').val());
                overhead = parseFloat($('#overhead').val());
                kuantitas = parseFloat($('#kuantitas_beli').val());
                margin = parseFloat($('#margin').val());
                pajak = parseFloat($('#pajak').val());

                
                totalcogs = beli_pabrik + kirim_pabrik + bongkar_pabrik + kirim_gudang + bongkar_gudang+overhead;   

                var totalcogsObj = document.getElementById('total_cogs');
                totalcogsObj.value = Math.round(totalcogs);
                
                var cogs  =document.getElementById('cogs_satuan');
                cogs.value =Math.round (totalcogs/kuantitas);

                var harga  =document.getElementById('harga_jual_1');
                harga.value = Math.round((totalcogs/kuantitas)+margin);

                var harga_final  =document.getElementById('harga_jual_final');
                harga_final.value = Math.round(((totalcogs/kuantitas)+margin)+(harga.value*pajak/100));
        }
        </script>
    </section>
    
@endsection
