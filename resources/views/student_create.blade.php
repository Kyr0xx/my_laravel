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
            <div class="card-header">Add Student Information</div>
            <div class="card-body">

              <form action="{{route('student.store')}}" method="post">
                @csrf
              
                <label>Name</label></br>
                <input type="text" name="name" id="name" class="form-control"> </br>
                <label>Section</label></br>
                <input type="text" name="section" id="section" class="form-control"> </br>
                <label>Mobile</label></br>
                <input type="text" name="mobile" id="mobile" class="form-control"> </br>
                <input type="submit" value="Save" class="btn btn-outline-success"> </br>

               </form>
            </div>
          </div>


        </div>

      </div>
    </div>
  </div>
</div>
</div>
@endsection