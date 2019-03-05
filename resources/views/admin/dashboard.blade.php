@extends('layouts.app')

@section('title','Dashboard')

@push('css')
<link rel="shortcut icon" type="image/png" href="{{asset('frontend/images/favicon.ico')}}"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap-datetimepicker.min.css') }} ">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
@endpush

@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-warning card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">content_copy</i>
                        </div>
                        <p class="card-category">Category / Item</p>
                        <h3 class="card-title">{{$categoryCount}}/{{$itemCount}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons text-danger">warning</i>
                        <a href="{{route('category.index')}}">Total categories and items</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-success card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">slideshow</i>
                        </div>
                        <p class="card-category">Slider Count</p>
                        <h3 class="card-title">{{$sliderCount}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                            <i class="material-icons">date_range</i>
                            <a href="{{route('slider.index')}}">Get More Details...</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-danger card-header-icon">
                        <div class="card-icon">
                        <i class="material-icons">info_outline</i>
                        </div>
                        <p class="card-category">Reservation</p>
                        <h3 class="card-title">{{$reservations->count()}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons">local_offer</i>
                        <a href="{{route('reservation.index')}}"> Not Confirmed Reservation</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-header card-header-info card-header-icon">
                        <div class="card-icon">
                        <i class="fa fa-twitter"></i>
                        </div>
                        <p class="card-category">Contact</p>
                        <h3 class="card-title">{{$contactCount}}</h3>
                    </div>
                    <div class="card-footer">
                        <div class="stats">
                        <i class="material-icons">update</i> 
                        <a href="{{route('contact.index')}}">Just Updated</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
              @include('layouts.partial.msg')
              <div class="card">
                <div class="card-header card-header-primary">
                  <h4 class="card-title ">Reservation</h4>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table id="table" class="table" cellspacing="0" width="100%" style="width:100%">
                      <thead class=" text-primary">
                        <th>ID</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Action</th>
                      </thead>
                      <tbody>
                        @foreach($reservations as $key=>$reservation)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $reservation->name }}</td>
                                <td>{{ $reservation->phone }}</td>
                                <td>
                                  @if($reservation->status == true)
                                    <span class="badge badge-info">Confirmed</span>
                                  @else
                                    <span class="badge badge-danger">Not confirmed yet</span>  
                                  @endif
                                </td>
                                <td class="text-justify text-center">
                                  @if($reservation->status == false)
                                    <form id="status-form-{{$reservation->id}}" method="POST" action="{{route('reservation.status',$reservation->id)}}" style="display:none" >
                                      @csrf 
                                    </form>
                                    <button type="button" class="btn btn-info" onclick="if(confirm('Are you verify this request by phone?'))    {event.preventDefault();document.getElementById('status-form-{{$reservation->id}}').submit();}else{event.preventDefault();}">
                                      <i class="material-icons"> done </i>
                                    </button>
                                  @endif

                                  <form id="delete-form-{{$reservation->id}}" method="POST" action="{{route('reservation.destroy',$reservation->id)}}" style="display:none" >
                                    @csrf 
                                    @method('DELETE') 
                                  </form>
                                  <button type="button" class="btn btn-danger" onclick="if(confirm('Are you sure? you want to delete this ?'))    {event.preventDefault();document.getElementById('delete-form-{{$reservation->id}}').submit();}else{event.preventDefault();}">
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