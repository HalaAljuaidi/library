@extends('cms.parent')

@section('title','Index Employee')

@section('styles')
@endsection

@section('main-title','Index Employee')

@section('sup-title','index employee')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table of city</h3> --}}
          <a href="{{ route('employees.create') }}" type="submit" class="btn btn-success">Create new Employee</a>
          <div class="card-tools">
            <div class="input-group input-group-sm" style="width: 150px;">
              <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

              <div class="input-group-append">
                <button type="submit" class="btn btn-default">
                  <i class="fas fa-search"></i>
                </button>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>name</th>
                <th>age</th>
                <th>number_of_hours_work</th>
                <th>status</th>
                <th>level_of_education</th>
                <th>attendees</th>

              </tr>
            </thead>
            <tbody>
                {{-- <td><span class="tag tag-danger">Denied</span></td> --}}
                @foreach ($employees as $employee)
                    <tr>
                    <td>{{ $employee->id }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->age }}</td>
                    <td>{{ $employee->number_of_hours_work }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>{{ $employee->level_of_education }}</td>
                    <td>{{ $employee->attendees }}</td>

                    <td>
                            <div class="btn-group">
                              <a href="{{ route('employees.edit'),$employee->id  }}" type="button" class="btn btn-primary">Edit</a>
                              <a href="#" onclick="perfotmDestroy({{ $employee->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              <button type="button" class="btn btn-info">Show</button>
                            </div>
                          </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        {{ $employees->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
function perfotmDestroy(id,referance){
let url='/cms/admin/employees/'+id;
confirmDestroy(url,referance);
}
<script/>

@endsection
