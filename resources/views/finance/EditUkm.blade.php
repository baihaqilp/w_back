@extends('finance.layouts.app2')

@section('content')
<section class="content">

      <div class="container-fluid">
        <div class="row">
          <!-- /.col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#BadanUsaha" data-toggle="tab">Badan Usaha</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Produk" data-toggle="tab">Produk</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Karyawan" data-toggle="tab">Karyawan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Personal" data-toggle="tab">Personal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#AlamatUsaha" data-toggle="tab">Alamat Usaha</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Berkas" data-toggle="tab">Berkas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Medsos" data-toggle="tab">Info Pendukung</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
              <form action="/finance/update_ukm/{{$umkms->id}}" method="POST" enctype="multipart/form-data" role="form">
                <div class="tab-content">
                

                <div class="active tab-pane" id="BadanUsaha">
                      <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Nama Usaha</b> 
                        <input type="text" class="form-control" id="nama_usaha" name="nama_usaha" value="{{$umkms->nama_usaha}}" required/>
                        
                      </li>
                      <li class="list-group-item">
                        <b>Bentuk Usaha</b>
                        <input type="text" class="form-control" id="bentuk_usaha" name="bentuk_usaha" value="{{$umkms->bentuk_usaha}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Tahun Mulai Usaha</b> 
                        <input type="text" class="form-control" id="tahun_usaha" name="tahun_usaha" value="{{$umkms->tahun_usaha}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                      <b>Omset</b> 
                      <input type="text" class="form-control" id="omset" name="omset" value="{{$umkms->omset}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Nomor Telepon Usaha</b>
                        <input type="text" class="form-control" id="no_telp_usaha" name="no_telp_usaha" value="{{$umkms->bentuk_usaha}}" placeholder=" " required/>
                      </li>
                    </ul>
                  </div>

                  <div class="active tab-pane" id="Produk">
                      <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Jenis Produk atau Layanan </b>
                        <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" value="{{$umkms->jenis_produk}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Foto Produk atau Layanan</b>
                        <br><img src="/img/umkm/{{$umkms->foto_produk}}" alt="" width="250px">
                        <input type="file" class="form-control" id="foto_produk" name="foto_produk" value="{{$umkms->foto_produk}}" placeholder="Nama Usaha " required/>

                      </li>
                      <li class="list-group-item">
                        <b>Bahan Baku </b> 
                        <input type="text" class="form-control" id="bahan_baku" name="bahan_baku" value="{{$umkms->bahan_baku}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Kebutuhan Bahan Baku</b> 
                        <input type="text" class="form-control" id="kebutuhan_bahan" name="kebutuhan_bahan" value="{{$umkms->kebutuhan_bahan}}" placeholder="Nama Usaha " required/>

                      </li>
                      <li class="list-group-item">
                        <b>Nama Merk Dagang </b> 
                        <input type="text" class="form-control" id="nama_merk" name="nama_merk" value="{{$umkms->nama_merk}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Deskripsi Produk </b>
                        <input type="text" class="form-control" id="deskripsi_produk" name="deskripsi_produk" value="{{$umkms->deskripsi_produk}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Variasi Produk atau Varian </b>
                        <input type="text" class="form-control" id="variasi_produk" name="variasi_produk" value="{{$umkms->variasi_produk}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Deskripsi Kegiatan Usaha </b>
                        <input type="text" class="form-control" id="deskripsi_usaha" name="deskripsi_usaha" value="{{$umkms->deskripsi_usaha}}" placeholder="Nama Usaha " required/>
                      </li>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="Karyawan">
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Karyawan Tetap Pria </b> 
                        <input type="text" class="form-control" id="karyawan_tetap_pria" name="karyawan_tetap_pria" value="{{$umkms->karyawan_tetap_pria}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                      <b>Karyawan Tidak Tetap Pria </b> 
                      <input type="text" class="form-control" id="karyawan_tidak_tetap_pria" name="karyawan_tidak_etap_pria" value="{{$umkms->karyawan_tidak_tetap_pria}}" placeholder="Nama Usaha " required/>
                     </li>
                      <li class="list-group-item">
                        <b>Karyawan Tetap Wanita </b>
                        <input type="text" class="form-control" id="karyawan_tetap_wanita" name="karyawan_tetap_wanita" value="{{$umkms->karyawan_tetap_wanita}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Karyawan Tidak Tetap Wanita </b>
                        <input type="text" class="form-control" id="karyawan_tidak_tetap_wanita" name="karyawan_tidak_tetap_wanita" value="{{$umkms->karyawan_tidak_tetap_wanita}}" placeholder="Nama Usaha " required/>

                      </li>
                        <span class="username" style="font-size:30px;">
                          <a href="#">Jajaran Pengurus</a>
                        </span>
                        <li class="list-group-item">
                        <b>Nama </b> 
                        <input type="text" class="form-control" id="nama_pengurus" name="nama_pengurus" value="{{$umkms->nama_pengurus}}" placeholder="Nama Usaha " required/>
                        </li>
                        <li class="list-group-item">
                        <b>Kontak </b>
                        <input type="text" class="form-control" id="kontak" name="kontak" value="{{$umkms->kontak}}" placeholder="Nama Usaha " required/>
                        </li>
                        <li class="list-group-item">
                        <b>Jabatan </b> 
                        <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{$umkms->jabatan}}" placeholder="Nama Usaha " required/>
                        </li>
                    </ul>
                  
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="Personal">
                  <ul class="list-group list-group-unbordered mb-3">
                  <div class="timeline-item">

                        <h6 class="timeline-header"><a href="#">Foto Penanggung Jawab</a></h6>

                        <div class="timeline-body">
                        <img src="/img/umkm/{{$umkms->foto_pj}}" alt="" width="250px">
                        <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" value="{{$umkms->foto_pj}}" placeholder="Nama Usaha " required/>

                        </div>
                        </div>
                      <li class="list-group-item">
                        <b>Nomor KTP </b>
                        <input type="text" class="form-control" id="no_ktp_pj" name="no_ktp_pj" value="{{$umkms->no_ktp_pj}}" placeholder="Nama Usaha " required/>
                     </li>
                      <li class="list-group-item">
                        <b>Nama Lengkap </b>
                        <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{$umkms->nama_lengkap}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Email </b>
                        <input type="text" class="form-control" id="email" name="email" value="{{$umkms->email}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Alamat </b> 
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{$umkms->alamat}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Provinsi </b> 
                        <input type="text" class="form-control" id="provinsi" name="provinsi" value="{{$umkms->provinsi}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Kota </b> 
                        <input type="text" class="form-control" id="kota" name="kota" value="{{$umkms->kota}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Desa </b> 
                        <input type="text" class="form-control" id="desa" name="desa" value="{{$umkms->desa}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Kode POS </b> 
                        <input type="text" class="form-control" id="kode_pos" name="kode_pos" value="{{$umkms->kode_pos}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Nomor Telepon Rumah</b> 
                        <input type="text" class="form-control" id="no_telp_rumah" name="no_telp_rumah" value="{{$umkms->no_telp_rumah}}" placeholder="Nama Usaha " required/>
                      </li>
                      <li class="list-group-item">
                        <b>Nomor Handphone </b> 
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{$umkms->no_hp}}" placeholder="Nama Usaha " required/>
                      </li>
                      <div class="timeline-item">

                          <h6 class="timeline-header"><a href="#">Foto KTP</a></h6>

                          <div class="timeline-body">
                          <img src="/img/umkm/{{$umkms->foto_ktp}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_ktp" name="foto_ktp" value="{{$umkms->foto_ktp}}" placeholder="Nama Usaha " required/>

                          </div>
                        </div>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="AlamatUsaha">
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Alamat Utama Usaha </b>
                        <input type="text" class="form-control" id="alamat_usaha_utama" name="alamat_usaha_utama" value="{{$umkms->alamat_usaha_utama}}" placeholder="Nama Usaha " required/>

                      </li>
                      <li class="list-group-item">
                        <b>Provinsi </b> 
                        <input type="text" class="form-control" id="provinsi_usaha" name="provinsi_usaha" value="{{$umkms->provinsi_usaha}}" placeholder="Nama Usaha " />

                      </li>
                      <li class="list-group-item">
                        <b>Kota </b>
                        <input type="text" class="form-control" id="kota_usaha" name="kota_usaha" value="{{$umkms->kota_usaha}}" placeholder="Nama Usaha " />
 
                      </li>
                      <li class="list-group-item">
                        <b>Alamat Usaha lain </b> 
                        <input type="text" class="form-control" id="alamat_usaha_lain" name="alamat_usaha_lain" value="{{$umkms->alamat_usaha_lain}}" placeholder="Nama Usaha " />
                        <input type="text" class="form-control" id="alamat_usaha_lain2" name="alamat_usaha_lain2" value="{{$umkms->alamat_usaha_lain2}}" placeholder="Nama Usaha " />
                      </li>
                    </ul>
                  </div>
                  <!--tab pane-->
                  <div class="tab-pane" id="Berkas">
                  <div class="timeline-item">

                          <h6 class="timeline-header"><a href="#">Berkas Perijinan</a></h6>

                          <div class="timeline-body">
                          <img src="/img/umkm/{{$umkms->foto_iumk}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_iumk" name="foto_iumk" value="{{$umkms->foto_iumk}}" placeholder="Nama Usaha " required/>
                          <img src="/img/umkm/{{$umkms->foto_sku}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_sku" name="foto_sku" value="{{$umkms->foto_sku}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_izin_usaha_industri}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_izin_usaha_industri" name="foto_izin_usaha_industri" value="{{$umkms->foto_izin_usaha_industri}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_surat_ijin}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_surat_ijin" name="foto_surat_ijin" value="{{$umkms->foto_surat_ijin}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_npwp_pemilik}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_npwp_pemilik" name="foto_npwp_pemilik" value="{{$umkms->foto_npwp_pemilik}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_npwp_bu}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_npwp_bu" name="foto_npwp_bu" value="{{$umkms->foto_npwp_bu}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_sk_usaha}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_sk_usaha" name="foto_sk_usaha" value="{{$umkms->foto_sk_usaha}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_tdup}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_tdup" name="foto_tdup" value="{{$umkms->foto_tdup}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_akta_usaha}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_akta_usaha" name="foto_akta_usaha" value="{{$umkms->foto_akta_usaha}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_imb}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_imb" name="foto_imb" value="{{$umkms->foto_imb}}" placeholder="Nama Usaha " required/>

                                              
                          </div>
                          <h6 class="timeline-header"><a href="#">Berkas Sertifikat</a></h6>

                          <div class="timeline-body">
                          <img src="/img/umkm/{{$umkms->foto_pirt}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_pirt" name="foto_pirt" value="{{$umkms->foto_pirt}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_sh}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_sh" name="foto_sh" value="{{$umkms->foto_sh}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_sni}}" alt="" width="250px">   
                          <input type="file" class="form-control" id="foto_sni" name="foto_sni" value="{{$umkms->foto_sni}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_izin_alat_kesehatan}}" alt="" width="250px"> 
                          <input type="file" class="form-control" id="foto_izin_alat_kesehatan" name="foto_izin_alat_kesehatan" value="{{$umkms->foto_izin_alat_kesehatan}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_pkrt}}" alt="" width="250px">  
                          <input type="file" class="form-control" id="foto_pkrt" name="foto_pkrt" value="{{$umkms->foto_pkrt}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_iso}}" alt="" width="250px">  
                          <input type="file" class="form-control" id="foto_iso" name="foto_iso" value="{{$umkms->foto_iso}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_keamanan}}" alt="" width="250px">   
                          <input type="file" class="form-control" id="foto_keamanan" name="foto_keamanan" value="{{$umkms->foto_keamanan}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_halal}}" alt="" width="250px"> 
                          <input type="file" class="form-control" id="foto_halal" name="foto_halal" value="{{$umkms->foto_halal}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_bpom}}" alt="" width="250px"> 
                          <input type="file" class="form-control" id="foto_bpom" name="foto_bpom" value="{{$umkms->foto_bpom}}" placeholder="Nama Usaha " required/>

                          <img src="/img/umkm/{{$umkms->foto_sertifikat_khusus_pangan}}" alt="" width="250px">
                          <input type="file" class="form-control" id="foto_sertifikat_khusus_pangan" name="foto_sertifikat_khusus_pangan" value="{{$umkms->foto_sertifikat_khusus_pangan}}" placeholder="Nama Usaha " required/>
  
                          <img src="/img/umkm/{{$umkms->foto_sertifikat_non_pangan}}" alt="" width="250px">   
                          </div>
                        </div>
                  </div>
                  <!-- tab pane -->
                  <div class="tab-pane" id="Medsos">
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Website </b> 
                        <input type="text" class="form-control" id="website" name="website" value="{{$umkms->website}}" placeholder="Website " />
                      </li>
                      <li class="list-group-item">
                      <b>Social Media </b>
                      <input type="text" class="form-control" id="sosmed" name="sosmed" value="{{$umkms->sosmed}}" placeholder="Nama Sosial Media" />
                      <input type="text" class="form-control" id="link_sosmed" name="link_sosmed" value="{{$umkms->link_sosmed}}" placeholder="Link Sosial Media" />
                      </li>
                      <li class="list-group-item">
                        <b>MarketPlace </b>
                        <input type="text" class="form-control" id="marketplace" name="marketplace" value="{{$umkms->marketplace}}" placeholder="Nama Marketplace " />
                        <input type="text" class="form-control" id="kota_usaha" name="kota_usaha" value="{{$umkms->kota_usaha}}" placeholder="Link marketplace " />
                      </li>
                      <li class="list-group-item">
                      <h6 class="timeline-header"><a href="#">KONTAK PENDAMPING</a></h6>
                      <b>Nama </b>
                      <input type="text" class="form-control" id="nama_mentor" name="nama_mentor" value="{{$umkms->nama_mentor}}" placeholder="Nama Usaha " />
                      </li>
                      <li class="list-group-item">
                        <b>Kontak Mentor(HP/Email) </b>
                        <input type="text" class="form-control" id="kontak_mentor" name="kontak_mentor" value="{{$umkms->kontak_mentor}}" placeholder="Nama Usaha " />
                      </li>
                      <li class="list-group-item">
                        <b>Jenis Kontak Mentor </b> 
                        <input type="text" class="form-control" id="jenis_kontak_mentor" name="jenis_kontak_mentor" value="{{$umkms->jenis_kontak_mentor}}" placeholder="Nama Usaha " />
                      </li>
                      <li class="list-group-item">
                        <b>Asosiasi/Komunitas </b>
                        <input type="text" class="form-control" id="asosiasi_komunitas" name="asosiasi_komunitas" value="{{$umkms->asosiasi_komunitas}}" placeholder="Nama Usaha " />

                      </li>
                      <li class="list-group-item">
                        <b>Nama Organisasi </b>
                        <input type="text" class="form-control" id="nama_organisasi" name="nama_organisasi" value="{{$umkms->nama_organisasi}}" placeholder="Nama Usaha " />

                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.tab-content -->
                                 <button type="submit" class="btn btn-lg btn-primary" style="float:right;">
                                    Simpan
                                </button>
                                <a href="" class="btn btn-secondary btn-lg " role="button" style ="float:right;">Cancel</a>

                </form>

              </div><!-- /.card-body -->
                
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    @endsection