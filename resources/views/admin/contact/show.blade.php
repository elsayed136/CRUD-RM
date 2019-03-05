@extends('layouts.app')

@section('title','Contact')

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
                  <h4 class="card-title ">{{$contact->subject}}</h4>
                </div>
                <div class="card-body"></div>
                    
                        <div class="row ml-3 mr-3">
                            <div class="com-md-12">
                                <h4 class="font-weight-bold">Name: {{$contact->name}}</h4>
                                <h4 class="font-weight-bold">Email: {{$contact->email}}</h4>
                                <h4 class="font-weight-bold">Message: </h4>
                                <p class="font-italic pl-2 pr-2">{{$contact->message}}</p>

                            </div>
                        </div>
                    <a href="{{route('contact.index')}}" class="btn btn-danger col-1 ml-3 mb-3">Back</a>
                    <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

@endsection

@push('scripts')

@endpush