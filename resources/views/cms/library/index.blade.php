
@extends('cms.parent')
@section('TITLE','index Library')
@section('main-title','index library')
@section('sub-title','data  of  library')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a  href="{{ route('libraries.create') }}" type="submit" class="btn btn-success">Create new library</a>
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
                <th>Manager</th>
                <th>Name of library</th>
                <th>Close time</th>
                <th>Open time</th>
                <th>Discription	</th>
                <th>Setting</th>

              </tr>
            </thead>
            <tbody>
                 @foreach ($libraries as $library)
                 <tr>
                    <td>{{  $library->id }}</td>
                    <td>{{  $library->manager->managerName }}</td>
                    <td>{{  $library->name }}</td>
                    <td>{{  $library->close_time }}</td>
                    <td>{{$library->open_time }}</td>
                    <td>{{  $library->discription }}</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{ route('libraries.edit',$library->id )}}" type="button" class="btn btn-primary">Edit</a>
                            <a  href="#" type="button"  onclick="performDestroy( {{ $library->id }},this)"  class="btn btn-danger">Delete</a>
                          </div>
                        </td>

                  </tr>

                     @endforeach
            </tbody>
          </table>
        </div>
        {{ $libraries->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,referance) {
        let url='/cms/admin/libraries/'+id;
        confirmDestroy(url,referance);


    }
</script>

@endsection
