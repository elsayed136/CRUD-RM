@extends('layouts.app')

@section('title','Contact')

@push('css')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datetimepicker.min.css') }} ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

@endpush

@section('content')

<div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Contact</h4>
                  <!-- <p class="card-category"> Here is a subtitle for this table</p> -->
                </div>
                <div class="card-body"></div>
                  <div class="table-responsive">
                    <table id="table" class="table" cellspacing="0" width="100%" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Subject</th> 
                        <th>Sent At</th>
                        <th class="text-justify text-center">Action</th>
                      </thead>
                      <tbody>
                        @foreach($contacts as $key=>$contact)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->subject }}</td>
                                <td>{{ $contact->created_at }}</td>
                                <td class="text-justify text-center">
                                  <a href="{{route('contact.show',$contact->id)}}" class="btn btn-info"> 
                                    <i class="material-icons" >details</i> 
                                  </a>
                                  <form id="delete-form-{{$contact->id}}" method="POST" action="{{ route('contact.destroy', $contact->id) }}" style="display:none" >
                                    @csrf 
                                    @method('DELETE') 
                                  </form>
                                  <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure? you want to delete this ?'))    {event.preventDefault();document.getElementById('delete-form-{{$contact->id}}').submit();}else{event.preventDefault();}">
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
<script src="{{ asset('frontend/js/bootstrap-datetimepicker.min.js') }} "></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
  $(function(){
      $('#datetimepicker').datetimepicker({
          format: "dd MM yyyy - HH:ii P",
          showMeridian: true,
          autoclose: true,
          todayBtn: true

      });
  });
</script>
{!! Toastr::message() !!}

@endpush