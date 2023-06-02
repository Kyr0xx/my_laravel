@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">

          <a href="{{route('student.index')}}" class="btn btn-success btn-sm" title="Go Back">Back</a>

          <div class="card" style="margin: 20px">
            <div class="card-header"> Student Information</div>
            <div class="card-body">

              <h3 class="card-title"> Name :{{$stud->name}}</h3>
              <h3 class="card-title"> Section :{{$stud->section}}</h3>
              <h3 class="card-title"> Mobile :{{$stud->mobile}}</h3>

            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
</div>
</div>
@endsection