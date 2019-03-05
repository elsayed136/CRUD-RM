<!-- Success msg for creating slider -->
@if(session('successC'))
    <div class="alert alert-success ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span> {{ session('successC') }} </span>
    </div>
@endif

<!-- Success msg for edit slider -->
@if(session('successU'))
    <div class="alert alert-success ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span> {{ session('successU') }} </span>
    </div>
@endif

<!-- Success msg for delete slider -->
@if(session('successD'))
    <div class="alert alert-success ">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <i class="material-icons">close</i>
        </button>
        <span> {{ session('successD') }} </span>
    </div>
@endif

<!-- error validation  -->
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger ">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <i class="material-icons">close</i>
            </button>
            <span> {{ $error }} </span>
        </div>
    @endforeach
@endif
