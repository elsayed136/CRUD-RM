@extends('layouts.app')

@section('title','Edit')

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
                  <h4 class="card-title">Create Slider</h4>
                  <!-- <p class="card-category">Complete your profile</p> -->
                </div>
                <div class="card-body">
                  <form method="POST" action="{{ route('slider.update', $slider->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Title</label>
                          <input type="text" name="title" class="form-control" value="{{ $slider->title }}" >
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Sub Title</label>
                          <input type="text" name="sub_title" class="form-control" value="{{ $slider->sub_title }}">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <label for="image" class="bmd-label-floating form-group">Upload Image</label>
                          <input id="image" type="file" class="form-control" name="image" >
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary pull-right">Edit</button>
                    <a href="{{ route('slider.index') }}" class="btn btn-danger pull-right">Back</a>
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