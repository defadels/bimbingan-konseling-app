@extends('layout.siswa_layout')

@section('title','Bimbingan Konseling Kelompok')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Bimbingan Konseling Kelompok</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">B&K Kelompok</li>
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
                    <h5 class="card-title">Bimbingan Konseling Kelompok &nbsp; <span class="@if($data_bk->status == 'Belum Ditanggapi'){{'badge bg-danger text-white'}} @else {{'badge bg-success'}} @endif">{{trans(ucfirst($data_bk->status))}}</span></h5>
                    <hr>

							<div class="row mb-3">
                                <div class="col-lg-6">
                                        <label for="">Nomor BK</label>
                                        <p>{{$data_bk->nomor_bk}}</p>
                                        <label for="">Dibuat Oleh</label>
                                        <p>{{$data_bk->dibuat_oleh->nama}} - [Kelas {{$data_bk->dibuat_oleh->pilihan_kelas->nama}}]</p>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Tanggal</label>
                                    <p>{{$data_bk->created_at}}</p>
                                </div>
                            </div>
                            
                            <div class="row mb-3">
                                <div class="col-lg-12">
                                    <p><strong>Daftar Nama Siswa</strong></p>
                                    <ol>
                                        @foreach($daftar_siswa as $siswa)
                                        <li><p>{{$siswa->nama_siswa}} - [Kelas {{$siswa->kelas}}]</p></li>
                                        @endforeach
                                    </ol>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="judul_bk">Judul</label>
                               
                                
                                <p>{{$data_bk->judul_bk}}</p>
                            </div>
                            <div class="form-group">
                                <label for="pokok_pembahasan">Pokok Pembahasan</label>
                                
                                <p>{{$data_bk->pokok_pembahasan}}</p>
                            </div>
        
                        
						</div>
					</div>
                </div> 
            </div>

    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tanggapan Guru</h5>
                    <hr>

                    @if(isset($data_bk->judul_tanggapan))
                        <div class="form-group">
                            <label for="">Nama Guru</label>
                            <p>{{$data_bk->ditanggapi_oleh->nama}} - [Pengajar {{$data_bk->ditanggapi_oleh->mapel}}]</p>
                        </div>

                  
                        <div class="form-group">
                            <label for="judul_tanggapan">Judul</label>
                        <p>{{$data_bk->judul_tanggapan}}</p>          
                       
                        </div>
                        <div class="form-group">
                            <label for="tanggapan">Tanggapan</label>
                            <p>{{$data_bk->tanggapan}}</p> 
                        </div>

                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                    @else 

                        <h2 class="p-3 text-center">Belum ditanggapi oleh guru</h2>
                    @endif
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

@section('page_script')
 
@endsection