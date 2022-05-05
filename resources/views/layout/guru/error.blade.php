@if(session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <h4>Sukses</h4>
        <p class="mb-o">{{session()->get('message')}}</p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

@if(session()->has('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <h4>Error</h4>
        <p class="mb-o">{{session()->get('error')}}</p>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
@endif