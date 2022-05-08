@extends('layout.siswa_layout')

@section('title','Bimbingan Konseling Karir')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Bimbingan Konseling Karir</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">B&K Karir</li>
                    </ol>
                    <a href="{{route('siswa.bimbingan.karir.create')}}" class="btn btn-md btn-primary">+ Tambah</a>
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
                    <h5 class="card-title">Bimbingan Konseling Karir</h5>
                    <div class="table-responsive">
                     @if(count($data_bk) > 0)   
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor BK</th>
                                    <th>Judul</th>
                                    <th>Jenis BK</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data_bk as $data)  
                                <tr>
                                    <td>{{$data->nomor_bk}}</td>
                                    <td>{{$data->judul_bk}}</td>
                                    <td>{{trans(ucfirst($data->jenis))}}</td>
                                    <td><span class="@if($data->status == 'Belum Ditanggapi'){{'badge bg-danger text-white'}} @else {{'badge bg-success'}} @endif">{{trans(ucfirst($data->status))}}</span></td>
                                    <td>
                                        <a href="{{route('siswa.bimbingan.karir.show',$data->id)}}" class="btn btn-md btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>

                        @else
                            <h2 class="p-3 text-center">Data Bimbingan Konseling Karir Kosong</h2>
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