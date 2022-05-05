@extends('layout.guru_layout')

@section('title','Dashboard Guru')

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
                    <a href="{{route('guru.guru.create')}}" class="btn btn-md btn-primary">+ Tambah</a>
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
                    <h5 class="card-title">Tabel Data Guru</h5>
                    <div class="table-responsive">
                    @if(count($daftar_guru)>0)    
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                    
                                </tr>
                            </thead>
                            <tbody>
                               @foreach($daftar_guru as $guru) 
                                <tr>
                                    <td>{{$guru->nama}}</td>
                                    <td>{{$guru->mapel}}</td>
                                    <td>{{$guru->status}}</td>
                                    <td>
                                        <a href="" title="Lihat" class="btn btn-md btn-info">
                                            <i class="fas fa-eye"></i> Lihat
                                        </a>
                                        <a href="{{route('guru.guru.edit',$guru->id)}}" title="Edit" class="btn btn-md btn-success">
                                            <i class="far fa-edit"></i> Edit
                                        </a>
                                    </td>
                                    
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>

                        @else
                            <h2 class="text-center p-3">Data guru kosong</h2>
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