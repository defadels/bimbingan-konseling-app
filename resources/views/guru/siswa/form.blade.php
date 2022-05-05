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
                  @if(isset($siswa))  
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
                    <h5 class="card-title">Form Data Siswa</h5>
                    <hr>
                    <form action="{{route($url, $siswa->id ?? '')}}" method="post">
                        @csrf
                        
                       @if(isset($siswa)) 
                        @method('put')
                       @endif

                      <div class="form-group">
                          <label for="nis">NIS</label>
                          <input type="text" value="{{old('nis') ?? $siswa->nis ?? ''}}" name="nis" id="" class="form-control @error('nis') {{'is-invalid'}} @enderror" placeholder="Masukkan NIS siswa">
                           
                          @error('nis')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror

                        </div>

                      <div class="form-group">
                          <label for="nama">Nama Siswa</label>
                          <input type="text" value="{{old('nama') ?? $siswa->nama ?? ''}}" name="nama" id="" class="form-control" placeholder="Masukkan nama siswa">
                      
                          @error('nama')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" value="{{old('tempat_lahir') ?? $siswa->tempat_lahir ?? ''}}" name="tempat_lahir" id="" class="form-control" placeholder="Masukkan tempat lahir siswa">
                        
                            @error('tempat_lahir')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                          </div>
                        
                          <div class="form-group">
                            <label for="tanggal_lahir">Tanggal Lahir</label>
                            <input type="date" value="{{old('tanggal_lahir') ?? $siswa->tanggal_lahir ?? ''}}" name="tanggal_lahir" id="" class="form-control">
                        
                            @error('tanggal_lahir')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                          </div>
                        

                      <div class="form-group">
                          <label for="jenis_kelamin">Jenis Kelamin</label>
                          <select name="jenis_kelamin" id="" class="form-control">
                              @foreach($jenis_kelamin as $jk)
                                <option value="{{$jk}}" @if(isset($siswa)) {{ $jk == $siswa->jenis_kelamin  ? 'selected' : '' }} @endif>{{$jk}}</option>
                                @endforeach
                          </select>
                          @error('jenis_kelamin')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>

                      <div class="form-group">
                          <label for="nomor_hp">Nomor Telepon</label>
                          <input type="text" value="{{old('nomor_hp') ?? $siswa->nomor_hp ?? ''}}" name="nomor_hp" id="" class="form-control" placeholder="Masukkan nomor handphone">
                          
                          @error('nomor_hp')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>

                        <div class="form-group">
                            <label for="agama">Agama</label>
                            <select name="agama" id="" class="form-control">
                                @foreach($daftar_agama as $agama)
                                  <option value="{{$agama}}" @if(isset($siswa)) {{ $siswa->agama == $agama ? 'selected' : '' }} @endif>{{$agama}}</option>
                                  @endforeach
                            </select>
                            @error('jenis_kelamin')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                          </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" value="{{old('email') ?? $siswa->email ?? ''}}" name="email" id="" class="form-control @error('email') {{'is-invalid'}} @enderror" placeholder="Masukkan NIP guru">
                             
                            @error('email')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
  
                          </div>

                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="" class="form-control @error('password') {{'is-invalid'}} @enderror" @if(isset($siswa))placeholder="Ketik jika ingin diubah"@endif>
                             
                            @error('password')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
  
                          </div>

                      <div class="form-group">
                          <label for="alamat">Alamat</label>
                          <textarea name="alamat" id="" cols="30" rows="10" class="form-control" placeholder="Masukkan alamat lengkap">{{old('alamat') ?? $siswa->alamat ?? ''}}</textarea>
                        
                          @error('alamat')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                      
                        </div>
  
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

@if(isset($siswa))
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
                <form action="{{ route('guru.siswa.destroy', $siswa->id ?? '') }}" method="post">
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