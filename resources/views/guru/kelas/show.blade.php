@extends('layout.guru_layout')

@section('title','Lihat Data Kelas')

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
                    <h5 class="card-title">Lihat Data Kelas</h5>
                    <hr>
                      <div class="form-group">
                          <label for="nama">Nama Kelas</label>
                          
                            <p>{{$kelas->nama}}</p>
                        </div>
                      <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                         
                          <p>{{$kelas->keterangan}}</p>
                    </div>
                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Data Siswa Dalam Kelas</h5>
                    <hr>
                  @if(count($data_siswa) > 0)  
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Nama Siswa</th>
                                <th scope="col">Jenis Kelamin</th>
                                <th scope="col">Nomor Handphone</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data_siswa as $siswa)
                            <tr>
                                <td>{{$siswa->nama}}</td>
                                <td>{{trans(ucfirst($siswa->jenis_kelamin))}}</td>
                                <td>{{$siswa->nomor_hp}}</td>
                            </tr>
                           
                            @endforeach
                        </tbody>
                        <tfoot>
                            <th colspan="2"><strong>Total Siswa</strong></th>
                            <td><strong>{{$data_siswa->count()}}</strong></td>
                        </tfoot>
                    </table>
                    @else
                        <h2 class="p-3 text-center">Data Siswa Dalam Kelas Kosong</h2>
                    @endif
                </div>
            </div>
        </div>
    </div>

</div>

@endsection