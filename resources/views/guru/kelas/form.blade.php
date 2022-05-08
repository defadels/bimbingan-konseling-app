@extends('layout.guru_layout')

@section('title','Form Data Kelas')

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
                   @if(isset($kelas)) 
                    <button data-toggle="modal" data-target="#deleteModal" class="btn btn-md btn-danger text-white"><i class="fas fa-trash-alt"></i> Hapus</button>
                    @endif
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
                    <h5 class="card-title">Tabel Data Kelas</h5>
                    <hr>
                    <form action="{{route($url, $kelas->id ?? '')}}" method="post">
                        @csrf
                        
                       @if(isset($kelas)) 
                        @method('put')
                       @endif

                      <div class="form-group">
                          <label for="nama">Nama Kelas</label>
                          <input type="text" name="nama" id="nama" value="{{old('nama') ?? $kelas->nama ?? ''}}" class="form-control @error('nama') {{ 'is-invalid' }} @enderror" placeholder="Masukkan nama kelas">
                            
                          @error('nama')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror

                        </div>
                      <div class="form-group">
                          <label for="keterangan">Keterangan</label>
                          <textarea name="keterangan" id="" cols="30" rows="10" class="form-control @error('keterangan') {{ 'is-invalid' }} @enderror" placeholder="Masukkan keterangan kelas">{{old('keterangan') ?? $kelas->keterangan ?? ''}}</textarea>
                         
                          @error('keterangan')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror

                    </div>
                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                      <input type="submit" value="{{$button}}" class="btn btn-md btn-info">
                    </form>

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

@if(isset($kelas))
<!-- modal -->
<div class="modal fade" id="deleteModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Delete</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p>
                    Kamu yakin menghapus data ini?
                </p>  
            </div>
            <div class="modal-footer">
                <form action="{{ route('guru.kelas.destroy', $kelas->id ?? '') }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-sm btn-secondary" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-sm btn-danger text-white" type="submit">
                <i class="fas fa-trash-alt"></i>    
                Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection