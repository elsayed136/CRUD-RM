@extends('layouts.app')

@section('title','Categories')

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
                  <h4 class="card-title ">All Categories</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body">
                  
                <a href="{{ route('category.create') }}" class="btn btn-primary float-left">Create Category</a>
                  
                  <div class="table-responsive">
                    <table id="table" class="table" cellspacing="0" width="100%" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Slug</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->slug }}</td>
                                <td>{{ $category->created_at }}</td>
                                <td>{{ $category->updated_at }}</td>
                                <td class="text-justify text-center">
                                  <a href="{{ route('category.edit', $category->id) }}" class="btn btn-info"> 
                                    <i class="material-icons" >mode_edit</i> 
                                  </a>
                                  <form id="delete-form-{{$category->id}}" method="POST" action="{{ route('category.destroy', $category->id) }}" style="display:none" >
                                    @csrf 
                                    @method('DELETE') 
                                  </form>
                                  <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure? you want to delete this ?'))    {event.preventDefault();document.getElementById('delete-form-{{$category->id}}').submit();}else{event.preventDefault();}">
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