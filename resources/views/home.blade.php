@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <h4>Welcome, {{Auth::user()->nama}}</h4>
                    <p>as <span class="badge bg-success text-white">{{ucfirst(trans(Auth::user()->jenis))}}</span> </p>

                    <p>{{ __('You are logged in!') }}</p> 


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
