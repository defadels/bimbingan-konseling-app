@extends('layout.guru_layout')

@section('title','Dashboard Guru')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Kelas</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Kelas</li>
                    </ol>
                    <a href="{{route('guru.kelas.create')}}" class="btn btn-md btn-primary">+ Tambah</a>
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
                    <h5 class="card-title">Tabel Data Kelas</h5>
                    <hr>
                    <form action="{{route($url)}}" method="post">
                        @csrf
  
                        @method('put')

                      <div class="form-group">
                          <label for="nama">Nama Kelas</label>
                          <input type="text" name="nama" id="" class="form-control" placeholder="Masukkan nama kelas">
                      </div>
                      <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <textarea name="keterangan" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan keterangan kelas"></textarea>
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