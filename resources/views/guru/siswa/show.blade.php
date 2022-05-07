@extends('layout.guru_layout')

@section('title','Form Data Siswa')

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
                    <h5 class="card-title">Lihat Data Siswa</h5>
                    <hr>

                    <div class="form-group">
                        {!! Form::label('nis', 'NIS') !!}
                        <p>{{$siswa->nis}}</p>

                      </div>

                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        {!! Form::label('nama', 'Nama Siswa') !!}
                        <p>{{$siswa->nama}}</p>

                      </div>

                      <div class="form-group">
                          {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                          <p>{{$siswa->tempat_lahir}}</p>

                        </div>
                      
                        <div class="form-group">
                          <label for="tanggal_lahir">Tanggal Lahir</label>
                          {!! Form::label('tanggal_lahir','Tanggal Lahir') !!}
                          <p>{{$siswa->tanggal_lahir}}</p>
                        </div>
                      

                    <div class="form-group">
                      {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                      <p>{{$siswa->jenis_kelamin}}</p>
                      </div>

                      <div class="form-group">
                          {!! Form::label('agama', 'Agama') !!}
                          <p>{{$siswa->agama}}</p>
                        </div>

                        <div class="form-group">
                          <label for="nomor_hp">Nomor Telepon</label>
                          {!! Form::label('nomor_hp','Nomor Telepon') !!}
                          <p>{{$siswa->nomor_hp}}</p>
                        </div>

                      <div class="form-group">
                        {!! Form::label('email', 'Email') !!}

                        <p>{{$siswa->email}}</p>


                        </div>

                        <div class="form-group">
                          {!! Form::label('kelas_id', 'Kelas') !!}

                          <p>{{$siswa->pilihan_kelas->nama}}</p>

                        </div>

                    <div class="form-group">
                        {!! Form::label('alamat', 'Alamat') !!}
                        <p>{{$siswa->alamat}}</p>
                    
                        
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