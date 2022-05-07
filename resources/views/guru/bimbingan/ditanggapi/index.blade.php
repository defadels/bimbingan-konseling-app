@extends('layout.guru_layout')

@section('title','Dashboard Guru')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Bimbingan Konseling Sudah Ditanggapi</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">BK Ditanggapi</li>
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
                    <h5 class="card-title">B&K Sudah Ditanggapi</h5>
                    <div class="table-responsive">
                        @if(count($data_bk) > 0)  
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nomor BK</th>
                                    <th>Ditanggapi Oleh</th>
                                    <th>Jenis BK</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                              @foreach($data_bk as $bk)  
                                <tr>
                                    <td>{{$bk->nomor_bk}}</td>
                                    <td>{{$bk->ditanggapi_oleh->nama}}</td>
                                    <td>{{trans(ucfirst($bk->jenis))}}</td>
                                    <td> <a href="{{route('guru.bimbingan.ditanggapi.show',$bk->id)}}" title="Lihat" class="btn btn-md btn-info">
                                        <i class="fas fa-eye"></i> Lihat
                                    </a>
                                </tr>
                                @endforeach
                            </tbody>
                           
                        </table>
                        @else
                            <h2 class="text-center p-3">Data BK Ditanggapi Kosong</h2>
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