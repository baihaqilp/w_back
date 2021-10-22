@extends('layouts.app_investor')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Berita</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                <li class="breadcrumb-item active">Berita </li>
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
                    <div class="card-body">
          
                <table id="example" class="table table-responsive-xl p-0 table-striped table-bordered" style="width:100%; ">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Isi</th>
                        <th>Link </th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                  @foreach($beritas as $berita)
                  <tr>
                        <td>{{$berita->id}}</td>
                        <td><img src="/img/berita/{{ $berita->gambar_berita}}" alt="" width="100px"></td>
                        <td>{{$berita->judul_berita}}</td>
                        <td>{{$berita->isi}}</td>
                        <td>{{$berita->link}}</td>
                        <td>{{$berita->tanggal_berita}}</td>
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