
@extends('cms.parent')
@section('TITLE','index author')
@section('main-title','index author')
@section('sub-title','data  of  author')

@section('styles')

@endsection

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <a  href="{{ route('authors.create') }}" type="submit" class="btn btn-success">Create new author</a>
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
                <th>Author Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>date  of  birth</th>
                <th>Mobile</th>
                <th>Status</th>
                <th>Setting</th>



              </tr>
            </thead>
            <tbody>
                 @foreach ($authors as $author)
                 <tr>
                    <td>{{  $author->id }}</td>
                    <td>{{  $author->name }}</td>
                    <td>{{  $author->email }}</td>
                    <td>{{$author->password }}</td>
                    <td>{{  $author->date_of_birth}}</td>
                    <td>{{  $author->mobile}}</td>
                    <td>{{  $author->status}}</td>

                    <td>
                        <div class="btn-group">
                            <a href="{{ route('authors.edit',$author->id )}}" type="button" class="btn btn-primary">Edit</a>
                            <a  href="#" type="button"   onclick="performDestroy( {{ $author->id }},this)"    class="btn btn-danger">Delete</a>
                            <a href="{{ route('authors.index') }}" type="button" class="btn btn-info">Show</a>
                          </div>
                        </td>

                  </tr>

                     @endforeach
            </tbody>
          </table>
        </div>
        {{ $authors->links() }}

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
    function performDestroy(id,referance) {
        let url='/cms/admin/authors/'+id;
        confirmDestroy(url,referance);



    }
</script>

@endsection
