@extends('layout.guru_layout')

@section('title','Data Laporan')

@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Data Laporan</h4>
            <div class="ms-auto text-end">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Laporan</li>
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
                    <h5 class="card-title">Tabel Data BK Siswa</h5>
                    <div class="table-responsive">
                      @if(count($daftar_siswa)>0)  
                        <table id="laporan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomor BK</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $no = 1;
                                ?>
                                @foreach($daftar_siswa as $siswa)
                                <tr>
                                    <td>{{$no++}}</td>
                                    <td>{{$siswa->nomor_bk}}</td>
                                    <td>{{$siswa->dibuat_oleh->nama}}</td>
                                    <td>{{$siswa->dibuat_oleh->pilihan_kelas->nama}}</td>
                                    <td>{{ucfirst(trans($siswa->jenis))}}</td>
                                    <td>{{$siswa->status}}</td>
                              
                                </tr>
                                @endforeach
                            </tbody>
                            
                        </table>

                        @else 
                         <h2 class="text-center p-3">Data Bimbingan Konseling Kosong</h2>
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

@section('page_script')
    <script>
        
            $('#laporan').DataTable({
                dom : 'Bfrtip',
                buttons : [

                    'pdf','csv', 'excel', 'print', 'copy'
                ]
            });
       
    </script>
@endsection