@extends('layouts.app2')

@section('content')
<section class="content">

      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">

                <h3 class="profile-username text-center">{{$umkms->nama_usaha}}</h3>

                <p class="text-muted text-center">{{$umkms->bentuk_usaha}}</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Tahun Mulai Usaha </b> <a class="float-right">{{$umkms->tahun_usaha}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Omset per Tahun</b> <a class="float-right">{{$umkms->omset}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Bidang Usaha</b> 
                    <br><a>{{$umkms->bidang_usaha}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>No Telp</b> <a class="float-right">{{$umkms->no_telp_usaha}}</a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
           
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#Produk" data-toggle="tab">Produk</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Karyawan" data-toggle="tab">Karyawan</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Personal" data-toggle="tab">Personal</a></li>
                  <li class="nav-item"><a class="nav-link" href="#AlamatUsaha" data-toggle="tab">Alamat Usaha</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Berkas" data-toggle="tab">Berkas</a></li>
                  <li class="nav-item"><a class="nav-link" href="#Medsos" data-toggle="tab">Info Pendukung</a></li>
                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="Produk">
                      <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Jenis Produk atau Layanan </b> <a class="float-right">{{$umkms->jenis_produk}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Foto Produk atau Layanan</b> <a class="float-right"><img src="/img/umkm/{{$umkms->foto_produk}}" alt="" width="250px"></a>
                      </li>
                      <li class="list-group-item">
                        <b>Bahan Baku </b> 
                        <br><a>{{$umkms->bahan_baku}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Kebutuhan Bahan Baku</b> 
                        <br><a>{{$umkms->kebutuhan_bahan}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Nama Merk Dagang </b> <a class="float-right">{{$umkms->nama_merk}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Deskripsi Produk </b>
                        <br> <a>{{$umkms->deskripsi_produk}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Variasi Produk atau Varian </b> <a class="float-right">{{$umkms->variasi_produk}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Deskripsi Kegiatan Usaha </b>
                        <br> <a >{{$umkms->deskripsi_usaha}}</a>
                      </li>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="Karyawan">
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Karyawan Tetap Pria </b> <a class="float-right">{{$umkms->karyawan_tetap_pria}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Karyawan Tidak Tetap Pria </b> <a class="float-right">{{$umkms->karyawan_tidak_tetap_pria}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Karyawan Tetap Wanita </b> <a class="float-right">{{$umkms->karyawan_tetap_wanita}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Karyawan Tidak Tetap Wanita </b> <a class="float-right">{{$umkms->karyawan_tidak_tetap_wanita}}</a>
                      </li>
                      
                      <li class="list-group-item">
                        <b>Karyawan Tetap Wanita </b> <a class="float-right">{{$umkms->karyawan_tetap_wanita}}</a>
                      </li>
                        <span class="username" style="font-size:30px;">
                          <a href="#">Jajaran Pengurus</a>
                        </span>
                        <li class="list-group-item">
                        <b>Nama </b> <a class="float-right">{{$umkms->nama_pengurus}}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Kontak </b> <a class="float-right">{{$umkms->kontak}}</a>
                        </li>
                        <li class="list-group-item">
                        <b>Jabatan </b> <a class="float-right">{{$umkms->jabatan}}</a>
                        </li>
                    </ul>
                  
                  </div>
                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="Personal">
                  <ul class="list-group list-group-unbordered mb-3">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid"
                        src="/img/umkm/{{$umkms->foto_pj}}"
                            alt="User profile picture">
                      </div>
                      <li class="list-group-item">
                        <b>Nomor KTP </b> <a class="float-right">{{$umkms->no_ktp_pj}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Nama Lengkap </b> <a class="float-right">{{$umkms->nama_lengkap}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Email </b> <a class="float-right">{{$umkms->email}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Alamat </b> <a class="float-right">{{$umkms->alamat}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Provinsi </b> <a class="float-right">{{$umkms->provinsi}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Kota </b> <a class="float-right">{{$umkms->kota}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Desa </b> <a class="float-right">{{$umkms->desa}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Kode POS </b> <a class="float-right">{{$umkms->kode_pos}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Nomor Telepon Rumah</b> <a class="float-right">{{$umkms->no_telp_rumah}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Nomor Handphone </b> <a class="float-right">{{$umkms->no_hp}}</a>
                      </li>
                      <div class="timeline-item">

                          <h6 class="timeline-header"><a href="#">Foto KTP</a></h6>

                          <div class="timeline-body">
                          <img src="/img/umkm/{{$umkms->foto_ktp}}" alt="" width="250px">
                            
                          </div>
                        </div>
                    </ul>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="AlamatUsaha">
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Alamat Utama Usaha </b> <a class="float-right">{{$umkms->alamat_usaha_utama}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Provinsi </b> <a class="float-right">{{$umkms->provinsi_usaha}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Kota </b> <a class="float-right">{{$umkms->kota_usaha}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Alamat Usaha lain </b> 
                        <a class="float-right">{{$umkms->alamat_usaha_lain}}</a>
                        <br><a class="float-right">{{$umkms->alamat_usaha_lain2}}</a>
                      </li>
                    </ul>
                  </div>
                  <!--tab pane-->
                  <div class="tab-pane" id="Berkas">
                  <div class="timeline-item">

                          <h6 class="timeline-header"><a href="#">Berkas Perijinan</a></h6>

                          <div class="timeline-body">
                          <img src="/img/umkm/{{$umkms->foto_iumk}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_sku}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_izin_usaha_industri}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_surat_ijin}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_npwp_pemilik}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_npwp_bu}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_sk_usaha}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_tdup}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_akta_usaha}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_IMB}}" alt="" width="250px">
                                              
                          </div>
                          <h6 class="timeline-header"><a href="#">Berkas Sertifikat</a></h6>

                          <div class="timeline-body">
                          <img src="/img/umkm/{{$umkms->foto_pirt}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_sh}}" alt="" width="250px">
                          <img src="/img/umkm/{{$umkms->foto_sni}}" alt="" width="250px">   
                          <img src="/img/umkm/{{$umkms->foto_izin_alat_kesehatan}}" alt="" width="250px"> 
                          <img src="/img/umkm/{{$umkms->foto_pkrt}}" alt="" width="250px">  
                          <img src="/img/umkm/{{$umkms->foto_iso}}" alt="" width="250px">  
                          <img src="/img/umkm/{{$umkms->foto_keamanan}}" alt="" width="250px">   
                          <img src="/img/umkm/{{$umkms->foto_halal}}" alt="" width="250px"> 
                          <img src="/img/umkm/{{$umkms->foto_bpom}}" alt="" width="250px"> 
                          <img src="/img/umkm/{{$umkms->foto_sertifikat_khusus_pangan}}" alt="" width="250px">  
                          <img src="/img/umkm/{{$umkms->foto_sertifikat_non_pangan}}" alt="" width="250px">     
                          </div>
                        </div>
                  </div>
                  <!-- tab pane -->
                  <div class="tab-pane" id="Medsos">
                  <ul class="list-group list-group-unbordered mb-3">
                      <li class="list-group-item">
                        <b>Website </b> <a class="float-right">{{$umkms->website}}</a>
                      </li>
                      <li class="list-group-item">
                      <b>Social Media </b> <a class="float-right">{{$umkms->sosmed}}</a>
                        <br><a class="float-right">{{$umkms->link_sosmed}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>MarketPlace </b> <a class="float-right">{{$umkms->marketplace}}</a>
                        <br><a class="float-right">{{$umkms->link_marketplace}}</a>
                      </li>
                      <li class="list-group-item">
                      <h6 class="timeline-header"><a href="#">KONTAK PENDAMPING</a></h6>
                      <b>Nama </b> <a class="float-right">{{$umkms->nama_mentor}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Kontak Mentor(HP/Email) </b> <a class="float-right">{{$umkms->kontak_mentor}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Jenis Kontak Mentor </b> <a class="float-right">{{$umkms->jenis_kontak_mentor}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Asosiasi/Komunitas </b> <a class="float-right">{{$umkms->asosiasi_komunitas}}</a>
                      </li>
                      <li class="list-group-item">
                        <b>Nama Organisasi </b> <a class="float-right">{{$umkms->nama_organisasi}}</a>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- /.tab-content -->
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