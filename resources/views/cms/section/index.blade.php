
@extends('cms.parent')
@section('TITLE','index Section')
@section('main-title','index Section')
@section('sub-title','data  of  section')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a  href="{{ route('sections.create') }}" type="submit" class="btn btn-success">Create new section</a>
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
                <th>Section Name</th>
                <th>Store   Title</th>
                <th>Setting</th>

              </tr>
            </thead>
            <tbody>
                 @foreach ($sections as $section)
                 <tr>
                    <td>{{  $section->id }}</td>
                    <td>{{  $section->name }}</td>
                    <td>{{  $section->store->title }}</td>
                    <td>
                        <div class="btn-group">
                            <a href="{{ route('sections.edit',$section->id )}}" type="button" class="btn btn-primary">Edit</a>
                            <a  href="#" type="button"  onclick="performDestroy( {{ $section->id }},this)"  class="btn btn-danger">Delete</a>
                          </div>
                        </td>

                  </tr>

                     @endforeach
            </tbody>
          </table>
        </div>
        {{ $sections->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,referance) {
        let url='/cms/admin/sections/'+id;
        confirmDestroy(url,referance);


    }
</script>

@endsection
