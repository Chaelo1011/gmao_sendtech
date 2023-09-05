@if(session('message'))
    <!-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{session('message')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div> -->

    <div class="alert alert-dismissible @if(str_contains(session('message'), 'exclamation')) alert-danger @else alert-success @endif fade show">
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        {!!session('message')!!}
    </div>
@endif





