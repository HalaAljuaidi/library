@extends('cms.parent')

@section('title','Index Metaphor')

@section('styles')
@endsection

@section('main-title','Index Metaphor')

@section('sup-title','index metaphor')

@section('content')
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table of city</h3> --}}
          <a href="{{ route('metaphors.create') }}" type="submit" class="btn btn-success">Create new Metaphor</a>
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
                <th>time</th>
                <th>date</th>
                <th>return_date</th>

              </tr>
            </thead>
            <tbody>
                {{-- <td><span class="tag tag-danger">Denied</span></td> --}}
                @foreach ($metaphors as $metaphor)
                    <tr>
                    <td>{{ $metaphor->id }}</td>
                    <td>{{ $metaphor->time }}</td>
                    <td>{{ $metaphor->date }}</td>
                    <td>{{ $metaphor->return_date }}</td>

                    <td>
                            <div class="btn-group">
                              <a href="{{ route('metaphors.edit'),$metaphor->id  }}" type="button" class="btn btn-primary">Edit</a>
                              <a href="#" onclick="perfotmDestroy({{ $metaphor->id }},this)" type="button" class="btn btn-danger">Delete</a>
                              <button type="button" class="btn btn-info">Show</button>
                            </div>
                          </td>
                  </tr>
                @endforeach

            </tbody>
          </table>
        </div>
        {{ $metaphors->links() }}
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
<script>
function perfotmDestroy(id,referance){
let url='/cms/admin/metaphors/'+id;
confirmDestroy(url,referance);
}
<script/>

@endsection
