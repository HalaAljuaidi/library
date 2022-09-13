@extends('cms.parent')

@section('title','Index Borrower')

@section('styles')
@endsection

@section('main-title','Index Borrower')

@section('sup-title','index borrower')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table of city</h3> --}}
          <a href="{{ route('borrowers.create') }}" type="submit" class="btn btn-success">Create new Borrower</a>
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
                <th>email</th>
                <th>mobile</th>
              </tr>
            </thead>
            <tbody>
                {{-- <td><span class="tag tag-danger">Denied</span></td> --}}
                @foreach ($borrowers as $borrower)
                    <tr>
                    <td>{{ $borrower->id }}</td>
                    <td>{{ $borrower->name }}</td>
                    <td>{{ $borrower->age }}</td>
                    <td>{{ $borrower->email }}</td>
                    <td>{{ $borrower->mobile }}</td>
                    <td>
                            <div class="btn-group">
                              <a href="{{ route('borrowers.edit'),$borrower->id  }}" type="button" class="btn btn-primary">Edit</a>
                              <a href="#" onclick="perfotmDestroy({{ $borrower->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              <button type="button" class="btn btn-info">Show</button>
                            </div>
                          </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        {{ $borrowers->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
function perfotmDestroy(id,referance){
let url='/cms/admin/borrowers/'+id;
confirmDestroy(url,referance);
}
<script/>

@endsection
