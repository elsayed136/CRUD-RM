@extends('layouts.app')

@section('title','Create')

@push('css')

@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            
            <div class="col-md-12">

              @include('layouts.partial.msg')
              
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title">Create Item</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('item.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Category</label>
                          <select class="form-control" name="category">
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Name</label>
                          <input type="text" name="name" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Description</label>
                          <textarea class="form-control" name="description" rows=3></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Price</label>
                          <input type="text" name="price" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label class="bmd-label-floating">Image</label>
                          <input type="file" name="image" class="form-control">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Create</button>
                    <a href="{{ route('item.index') }}" class="btn btn-danger pull-right">Back</a>
                    <div class="clearfix"></div>
                  </form>
                </div>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="card card-profile">
                <div class="card-avatar">
                  <a href="#pablo">
                    <img class="img" src="../assets/img/faces/marc.jpg" />
                  </a>
                </div>
                <div class="card-body">
                  <h6 class="card-category text-gray">CEO / Co-Founder</h6>
                  <h4 class="card-title">Alec Thompson</h4>
                  <p class="card-description">
                    Don't be scared of the truth because we need to restart the human foundation in truth And I love you like Kanye loves Kanye I love Rick Owens’ bed design but the back is...
                  </p>
                  <a href="#pablo" class="btn btn-primary btn-round">Follow</a>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </div>

       
@endsection

@push('scripts')
<script type="text/javascript">
    $(document).ready (function(){
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
        });
    });
  //     window.setTimeout(function() {
  //     $(".alert").fadeTo(500, 0).slideUp(500, function(){
  //         $(this).remove(); 
  //     });
  // }, 4000);
</script>

@endpush