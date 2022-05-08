@extends('layout.guru_layout')

@section('title','Data Siswa')

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
                    <a href="{{route('guru.siswa.create')}}" class="btn btn-md btn-primary">+ Tambah</a>
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
                    <div class="table-responsive">
                      @if(count($daftar_siswa)>0)  
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>NIS</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($daftar_siswa as $siswa)
                                <tr>
                                    <td>{{$siswa->nis}}</td>
                                    <td>{{$siswa->nama}}</td>
                                    <td>{{ucfirst(trans($siswa->jenis_kelamin))}}</td>
                                    <td>{{$siswa->pilihan_kelas->nama}}</td>
                                    <td>
                                        <a href="{{route('guru.siswa.show',$siswa->id)}}" title="Lihat" class="btn btn-md btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{route('guru.siswa.edit',$siswa->id)}}" title="Edit" class="btn btn-md btn-success text-white">
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>

                        @else 
                         <h2 class="text-center p-3">Data Siswa Kosong</h2>
                        @endif 
                    </div>

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