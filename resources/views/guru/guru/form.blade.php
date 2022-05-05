@extends('layout.guru_layout')

@section('title','Form Data Guru')

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
                   @if(isset($guru)) 
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
                    <h5 class="card-title">Form Data Guru</h5>
                    <hr>
                  <form action="{{route($url, $guru->id ?? '')}}" method="post">
                      @csrf

                      @if(isset($guru))
                      @method('put')
                      @endif
                    <div class="form-group">
                        <label for="nip">NIP</label>
                        <input type="text" value="{{old('nip') ?? $guru->nip ?? ''}}" name="nip" id="" class="form-control @error('nip'){{'is-invalid'}}@enderror" placeholder="Masukkan NIP guru">
                        <small>*Kosongkan jika tidak ada NIP</small>

                        @error('nip')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama Guru</label>
                        <input type="text" value="{{old('nama') ?? $guru->nama ?? ''}}" name="nama" id="" class="form-control @error('nama'){{'is-invalid'}}@enderror" placeholder="Masukkan nama guru">

                        @error('nama')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" value="{{old('email') ?? $guru->email ?? ''}}" name="email" id="" class="form-control @error('email'){{'is-invalid'}}@enderror" placeholder="Masukkan email guru">

                        @error('email')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" @if(isset($guru))placeholder="Ketik jika ingin diubah"@endif name="password" id="" class="form-control @error('password'){{'is-invalid'}}@enderror" placeholder="Masukkan password guru">

                        @error('password')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <input type="text" value="{{old('mapel') ?? $guru->mapel ?? ''}}" name="mapel" id="" class="form-control @error('mapel'){{'is-invalid'}}@enderror" placeholder="Masukkan mata pelajaran guru">

                        @error('mapel')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nomor_hp">Nomor Telepon</label>
                        <input type="text" value="{{old('nomor_hp') ?? $guru->nomor_hp ?? ''}}" name="nomor_hp" id="" class="form-control @error('nomor_hp'){{'is-invalid'}}@enderror" placeholder="Masukkan nomor handphone">

                        @error('nomor_hp')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="" cols="30" rows="10" class="form-control @error('alamat'){{'is-invalid'}}@enderror" placeholder="Masukkan alamat lengkap">{{old('alamat') ?? $guru->alamat ?? ''}}</textarea>

                        @error('alamat')
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
@if(isset($guru))
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
                <form action="{{ route('guru.guru.destroy', $guru->id ?? '') }}" method="post">
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