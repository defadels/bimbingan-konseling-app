@extends('layout.auth_layout')

@section('title','Form Register')


@section('content')
<div class="auth-box bg-dark border-top border-secondary">
    <div>
        <div class="text-center pt-3 pb-3">
            <span class="db"><img src="{{asset('matrix/assets/images/logo1.png')}}" alt="logo" /></span>
        </div>
        <!-- Form -->
        <form class="form-horizontal mt-3" method="POST" action="{{ route('pintudepan.create') }}">
            @csrf
            <div class="row pb-4">
                <div class="col-12">
                    <h3 class="text-center text-white">Registrasi Guru</h3>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-secondary text-white h-100" id="basic-addon1"><i class="ti-pin"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg @error('nip') is-invalid @enderror" placeholder="Isi jika ada NIP" name="nip" maxlength="12">
                        @error('nip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                <div class="col-12">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-success text-white h-100" id="basic-addon1"><i class="ti-user"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg @error('nama') is-invalid @enderror" placeholder="Nama Lengkap" name="nama" required>
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <!-- email -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="ti-email"></i></span>
                        </div>
                        <input id="email" name="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="{{ __('E-Mail Address') }}" required>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                        </div>
                        <input id="password" name="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" required>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-info text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                        </div>
                        <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" placeholder="{{ __('Konfirmasi Password') }}" required>
                      
                    </div>
                </div>
            </div>
            <div class="row border-top border-secondary">
                <div class="col-12">
                    <div class="form-group">
                        <div class="pt-3 d-grid">
                            <button class="btn btn-block btn-lg btn-info" type="submit">Register</button>
                        </div>
                        <div class="pt-3 d-grid">
                            <a class="btn btn-block btn-lg btn-primary" href="{{route('login')}}">Sudah Punya Akun</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection