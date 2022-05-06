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

                    @if(isset($siswa))

                    {!! Form::model($siswa, ['route' => [$url, $siswa->id],'method' => 'PUT']) !!}

                    <div class="form-group">
                        {!! Form::label('nis', 'NIS') !!}
                        {!! Form::text('nis', old('nis'), ['class' => 'form-control','placeholder' => 'Masukkan NIS siswa']) !!}
                         
                        @error('nis')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror

                      </div>

                    <div class="form-group">
                        <label for="nama">Nama Siswa</label>
                        {!! Form::label('nama', 'Nama Siswa') !!}
                        {!! Form::text('nama', old('nama'), ['class' => 'form-control', 'placeholder' => 'Masukkan nama siswa']) !!}
                    
                        @error('nama')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                          {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                          {!! Form::text('tempat_lahir', old('tempat_lahir'), ['class' => 'form-control', 'placeholder' => 'Masukkan tempat lahir']) !!}
                      
                          @error('tempat_lahir')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror

                        </div>
                      
                        <div class="form-group">
                          <label for="tanggal_lahir">Tanggal Lahir</label>
                          {!! Form::label('tanggal_lahir','Tanggal Lahir') !!}
                          {!! Form::date('tanggal_lahir', old('tanggal_lahir'), ['class' => 'form-control']) !!}
                      
                          @error('tanggal_lahir')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>
                      

                    <div class="form-group">
                      {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                      {!! Form::select('jenis_kelamin', $jenis_kelamin, old('jenis_kelamin'), ['class' => 'form-control', 'placeholder' => '--Pilih jenis kelamin--']) !!}
                       
                        @error('jenis_kelamin')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                      </div>

                      <div class="form-group">
                          {!! Form::label('agama', 'Agama') !!}
                          {!! Form::select('agama', $daftar_agama, old('agama'), ['placeholder' => 'Pilih agama','class' => 'form-control']) !!}
                        
                          @error('agama')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>

                        <div class="form-group">
                          <label for="nomor_hp">Nomor Telepon</label>
                          {!! Form::label('nomor_hp','Nomor Telepon') !!}
                          {!! Form::text('nomor_hp', old('nomor_hp'), ['class' => 'form-control', 'placeholder'=>'Masukkan nomor telepon']) !!}
                          
                          @error('nomor_hp')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>

                      <div class="form-group">
                        {!! Form::label('email', 'Email') !!}

                        {!! Form::email('email', old('email'), ['class' => 'form-control' , 'placeholder' => 'Masukkan email siswa']) !!}
                           
                          @error('email')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror

                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}

							{!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ketik jika ingin diubah']) !!}
                           
                          @error('password')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror

                        </div>

                        <div class="form-group">
                          {!! Form::label('kelas_id', 'Kelas') !!}

                          {!! Form::select('kelas_id', $daftar_kelas, old('kelas_id'), ['placeholder' => '--Pilih kelas--', 'class' => 'form-control']) !!}
                          
                          @error('kelas_id')
                          <span class="text-danger">
                              {{$message}}
                          </span>
                          @enderror
                        </div>

                    <div class="form-group">
                        {!! Form::label('alamat', 'Alamat') !!}
                        {!! Form::textarea('alamat', old('alamat'), ['class' => 'form-control']) !!}
                        
                        @error('alamat')
                        <span class="text-danger">
                            {{$message}}
                        </span>
                        @enderror
                        
                    </div>
                    
                        <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                      <input type="submit" value="{{$button}}" class="btn btn-md btn-info">
                      
                      {!! Form::close() !!}

                    @else

                    {!! Form::open(['route' => $url]) !!}
                        <div class="form-group">
                            {!! Form::label('nis', 'NIS') !!}
                            {!! Form::text('nis', old('nis'),['class' => 'form-control','placeholder' => 'Masukkan NIS siswa','maxlength' => '12']) !!}
                             
                            @error('nis')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
    
                          </div>
    
                        <div class="form-group">
                            <label for="nama">Nama Siswa</label>
                            {!! Form::label('nama', 'Nama Siswa') !!}
                            {!! Form::text('nama', old('nama'),['class' => 'form-control', 'placeholder' => 'Masukkan nama siswa']) !!}
                        
                            @error('nama')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                          </div>
    
                          <div class="form-group">
                              {!! Form::label('tempat_lahir', 'Tempat Lahir') !!}
                              {!! Form::text('tempat_lahir', old('tempat_lahir'), ['class' => 'form-control','placeholder' => 'Masukkan tempat lahir']) !!}
                          
                              @error('tempat_lahir')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
    
                            </div>
                          
                            <div class="form-group">
                              <label for="tanggal_lahir">Tanggal Lahir</label>
                              {!! Form::label('tanggal_lahir','Tanggal Lahir') !!}
                              {!! Form::date('tanggal_lahir',old('tanggal_lahir'),['class' => 'form-control']) !!}
                          
                              @error('tanggal_lahir')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
                            </div>
                          
    
                        <div class="form-group">
                          {!! Form::label('jenis_kelamin', 'Jenis Kelamin') !!}
                          {!! Form::select('jenis_kelamin', $jenis_kelamin, old('jenis_kelamin'),['class'=> 'form-control','placeholder' => '--Pilih jenis kelamin--']) !!}
                           
                            @error('jenis_kelamin')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                          </div>
    
                          <div class="form-group">
                              {!! Form::label('agama', 'Agama') !!}
                              {!! Form::select('agama', $daftar_agama, old('agama'), ['placeholder' => 'Pilih agama','class' => 'form-control']) !!}
                            
                              @error('agama')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
                            </div>
    
                            <div class="form-group">
                              <label for="nomor_hp">Nomor Telepon</label>
                              {!! Form::label('nomor_hp','Nomor Telepon') !!}
                              {!! Form::text('nomor_hp',old('nomor_hp'),['class' => 'form-control','placeholder'=>'Masukkan nomor telepon']) !!}
                              
                              @error('nomor_hp')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
                            </div>
    
                          <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
    
                            {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                               
                              @error('email')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
    
                            </div>
    
                            <div class="form-group">
                                {!! Form::label('password', 'Password') !!}
    
                                {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Ketik jika ingin diubah']) !!}
                               
                              @error('password')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
    
                            </div>
    
                            <div class="form-group">
                              {!! Form::label('kelas_id', 'Kelas') !!}
    
                              {!! Form::select('kelas_id', $daftar_kelas, old('kelas_id'), ['placeholder' => '--Pilih kelas--', 'class' => 'form-control']) !!}
                              
                              @error('kelas_id')
                              <span class="text-danger">
                                  {{$message}}
                              </span>
                              @enderror
                            </div>
    
                        <div class="form-group">
                            {!! Form::label('alamat', 'Alamat') !!}
                            {!! Form::textarea('alamat', old('alamat'), ['class' => 'form-control']) !!}
                            
                            @error('alamat')
                            <span class="text-danger">
                                {{$message}}
                            </span>
                            @enderror
                        
                            <button type="button" class="btn btn-md btn-secondary" onclick="window.history.back()">Kembali</button>
                          <input type="submit" value="{{$button}}" class="btn btn-md btn-info">
                 
                          {!! Form::close() !!}
                   
                    @endif 

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