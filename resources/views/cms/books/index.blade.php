@extends('cms.parent')

@section('title','Index Book')

@section('styles')
@endsection

@section('main-title','Index Book')

@section('sup-title','index book')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table of city</h3> --}}
          <a href="{{ route('books.create') }}" type="submit" class="btn btn-success">Create new Book</a>
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
                <th>date_of_issue</th>
                <th>status</th>

              </tr>
            </thead>
            <tbody>
                {{-- <td><span class="tag tag-danger">Denied</span></td> --}}
                @foreach ($books as $book)
                    <tr>
                    <td>{{ $book->id }}</td>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->date_of_issue }}</td>
                    <td>{{ $book->status }}</td>

                    <td>
                            <div class="btn-group">
                              <a href="{{ route('books.edit'),$book->id  }}" type="button" class="btn btn-primary">Edit</a>
                              <a href="#" onclick="perfotmDestroy({{ $book->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              <button type="button" class="btn btn-info">Show</button>
                            </div>
                          </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        {{ $books->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
function perfotmDestroy(id,referance){
let url='/cms/admin/books/'+id;
confirmDestroy(url,referance);
}
<script/>

@endsection
