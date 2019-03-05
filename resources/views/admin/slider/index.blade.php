@extends('layouts.app')

@section('title','Slider')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">All Slider</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  
                <a href="{{ route('slider.create') }}" class="btn btn-primary float-left">Create Slider</a>
                  
                  <div class="table-responsive">
                    <table id="table" class="table" cellspacing="0" width="100%" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Title</th>
                        <th>Sub Title</th>
                        <th>Image</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($sliders as $key=>$slider)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $slider->title }}</td>
                                <td>{{ $slider->sub_title }}</td>
                                <td>{{ $slider->image }}</td>
                                <td>{{ $slider->created_at }}</td>
                                <td>{{ $slider->updated_at }}</td>
                                <td class="text-justify text-center">
                                  <a href="{{ route('slider.edit', $slider->id) }}" class="btn btn-info"> 
                                    <i class="material-icons" >mode_edit</i> 
                                  </a>
                                  <form id="delete-form-{{$slider->id}}" method="POST" action="{{ route('slider.destroy', $slider->id) }}" style="display:none" >
                                    @csrf 
                                    @method('DELETE') 
                                  </form>
                                  <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure? you want to delete this ?'))    {event.preventDefault();document.getElementById('delete-form-{{$slider->id}}').submit();}else{event.preventDefault();}">
                                    <i class="material-icons"> delete </i>
                                  </button>
                               </td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script>
    $(document).ready(function() {
        $('#table').DataTable();
    } );
</script>

<!-- Script for autoHide alert msg with custom time  -->
<script type="text/javascript">
    $(document).ready (function(){
        $(".alert").fadeTo(2000, 500).slideUp(500, function(){
        $(".alert").slideUp(500);
        });
    });
    // window.setTimeout(function() {
    //   $(".alert").fadeTo(500, 0).slideUp(500, function(){
    //       $(this).remove(); 
    //   });
    // }, 4000);
</script>

@endpush