@extends('layout.guru_layout')

@section('title','Form Data Guru')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Guru</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Guru</li>
                    </ol>
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
                    <h5 class="card-title">Form Data Guru</h5>
                    <hr>
              
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <p>{{$guru->nip}}</p>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Guru</label>
                     
                        <p>{{$guru->nama}}</p>
                    </div>    
                    <div class="form-group">
                        <label for="email">Email</label>
                        
                        <p>{{$guru->email}}</p>
                    </div>

                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        
                        <p>{{$guru->mapel}}</p>
                    </div>
                    <div class="form-group">
                        <label for="nomor_hp">Nomor Telepon</label>
                        
                        <p>{{$guru->nomor_hp}}</p>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        
                        <p>{{$guru->alamat}}</p>
                    </div>
                   
                    <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>

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