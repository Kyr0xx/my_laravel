@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">

          <a href="{{route('student.create')}}" class="btn btn-success btn-sm" title="Add New Student">Add New</a>

          @if (session('status'))
          <div class="alert alert-success" role="alert">
            {{ session('status') }}
          </div>
          @endif

          <div class="table-responsive">
            <table class="table">
              <thread>
                <th>#</th>
                <th>Name</th>
                <th>Section</th>
                <th>Mobile</th>
                <th>Actions</th>
              </thread>
              <tbody>
                @foreach ($stud as $studentinfo)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$studentinfo->name}}</td>
                  <td>{{$studentinfo->section}}</td>
                  <td>{{$studentinfo->mobile}}</td>

                  <td>
                    <a href="{{ url('student/'. $studentinfo->id) }}" title="View Student"><button
                        class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View </button></a>

                    <a href="{{ url('/student/'.$studentinfo->id.'/edit/')}}" title="Edit Student"><button class="btn btn-primary btn-sm"><i
                          class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </button></a>

                    <form action="{{ url('/student'.'/'.$studentinfo->id) }}" method="POST" accept-charset="UTF-8" style="display: inline;">
                        {{ method_field('DELETE') }}
                        {{ csrf_field}}

                      <a href="" title="Delete Student" type="submit"><button class="btn btn-danger btn-sm"
                          onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-trash-o"></i>>
                          Delete </button></a>

                    </form>

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
@endsection