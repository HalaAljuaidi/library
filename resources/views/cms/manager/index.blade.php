@extends('cms.parent')

@section('title' , 'Index manager')

@section('styles')

@endsection

@section('main-title' , 'Index manager')

@section('sub-title' , 'index manager')


@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table of manager</h3> --}}
          <a href="{{ route('managers.create') }}" type="button" class="btn btn-primary">Add New manager</a>

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
                <th>Manager Name</th>
                <th>Age</th>
                <th>Address</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Password</th>
                <th>Gender</th>
                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach($managers as $manager)
                  <tr>
                    <td>{{$manager->id}}</td>
                    <td>{{$manager->managerName}}</td>
                    <td>{{$manager->age}}</td>
                    <td>{{$manager->address}}</td>
                    <td>{{$manager->mobile}}</td>
                    <td>{{$manager->email}}</td>
                    <td>{{$manager->password}}</td>
                    <td>{{$manager->gender}}</td>
                    <td>
                        <div class="btn">
                            <a href="{{route('managers.edit' , $manager->id )}}" type="button" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="performDestroy({{ $manager->id}} , this)" type="button" class="btn btn-danger">Delete</a>
                            {{-- <button type="button" class="btn btn-success">Information</button> --}}
                          </div>

                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
        </div>
           {{ $managers->links() }}

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
  <script>
     function performDestroy(id, reference){
    let url = '/cms/admin/managers/'+id;

   confirmDestroy(url, reference);
  }
    </script>
@endsection
