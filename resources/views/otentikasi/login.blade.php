@extends('layout.auth_layout')

@section('title','Form Register')


@section('content')
<div class="auth-box bg-dark border-top border-secondary">
    <div>
        <div class="text-center pt-3 pb-3">
            <span class="db"><img src="{{asset('matrix/assets/images/logo1.png')}}" alt="logo" /></span>
        </div>
        <!-- Form -->
        <form class="form-horizontal mt-3" action="index.html">
            <div class="row pb-4">
                <div class="col-12">
                    <!-- email -->
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-danger text-white h-100" id="basic-addon1"><i class="ti-email"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="Email Address" aria-label="Username" aria-describedby="basic-addon1" required>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-warning text-white h-100" id="basic-addon2"><i class="ti-pencil"></i></span>
                        </div>
                        <input type="text" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                    </div>
 
                </div>
            </div>
            <div class="row border-top border-secondary">
                <div class="col-12">
                    <div class="form-group">
                        <div class="pt-3 d-grid">
                            <button class="btn btn-block btn-lg btn-info" type="submit">Login</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection