@extends('layout.guru_layout')

@section('title','Dashboard Guru')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Siswa</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                    </ol>
                    <a href="" class="btn btn-md btn-primary">+ Tambah</a>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tabel Data Siswa</h5>
                    <hr>
                    <form action="{{route($url)}}" method="post">
                        @csrf
  
                        @method('put')
                      <div class="form-group">
                          <label for="nip">NISN</label>
                          <input type="text" name="nip" id="" class="form-control" placeholder="Masukkan NIP guru">
                      </div>
                      <div class="form-group">
                          <label for="nama">Nama Siswa</label>
                          <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan nama guru">
                      </div>
                      <div class="form-group">
                          <label for="mapel">Mata Pelajaran</label>
                          <input type="text" name="mapel" id="" class="form-control" placeholder="Masukkan mata pelajaran guru">
                      </div>
                      <div class="form-group">
                          <label for="nomor_hp">Nomor Telepon</label>
                          <input type="text" name="nomor_hp" id="" class="form-control" placeholder="Masukkan nomor handphone">
                      </div>
                      <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan alamat lengkap"></textarea>
                      </div>
  
                      <input type="submit" value="{{$button}}" class="btn btn-md btn-info">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Right sidebar -->
    <!-- ============================================================== -->
    <!-- .right-sidebar -->
    <!-- ============================================================== -->
    <!-- End Right sidebar -->
    <!-- ============================================================== -->
</div>
@endsection