@extends('layout.guru_layout')

@section('title','Profil Saya')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Profil Saya</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Profil</li>
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
                    <h5 class="card-title">Profil</h5>
                    <hr>
                                    
                    <p><b>Hak Akses: </b><span class="badge bg-success">{{trans(ucfirst(Auth::user()->jenis))}}</span></p>
                        <div class="form-group">
                            <label for="judul_bk">Foto Profil</label>
                            <br>
                            <img src="{{asset('matrix/assets/images/users/1.jpg')}}" alt="user" class="rounded-circle" style="width: 10%">
                        </div>

                        <div class="form-group">
                            <label for="nis">NIP</label>
                            
                            <p>{{Auth::user()->nip}}</p>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                           
                            
                            <p>{{Auth::user()->nama}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="kelas">Mata Pelajaran</label>
                           
                            
                            <p>{{Auth::user()->mapel}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            
                            <p>{{Auth::user()->email}}</p>
                        </div>
                        
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            
                            <p>{{Auth::user()->alamat}}</p>
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