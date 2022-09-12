@extends('cms.parent')

@section('title' , 'Index Store')

@section('styles')

@endsection

@section('main-title' , 'Index Store')

@section('sub-title' , 'index store')


@section('content')

<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          {{-- <h3 class="card-title">Table of store</h3> --}}
          <a href="{{ route('stores.create') }}" type="button" class="btn btn-primary">Add New store</a>

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
                <th>Store Title</th>
                <th>Library Name</th>

                <th>Setting</th>
              </tr>
            </thead>
            <tbody>

                @foreach($stores as $store)
                  <tr>
                    <td>{{$store->id}}</td>
                    <td>{{$store->title}}</td>
                    <td>{{$store->library->name}}</td>
                    <td>
                        <div class="btn">
                            <a href="{{route('stores.edit' , $store->id )}}" type="button" class="btn btn-primary">Edit</a>
                            <a href="#" onclick="performDestroy({{ $store->id}} , this)" type="button" class="btn btn-danger">Delete</a>
                            {{-- <button type="button" class="btn btn-success">Information</button> --}}
                          </div>

                    </td>
                  </tr>
                @endforeach


            </tbody>
          </table>
        </div>
           {{ $stores->links() }}

        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
@endsection

@section('scripts')
  <script>
     function performDestroy(id, reference){
    let url = '/cms/admin/stores/'+id;

   confirmDestroy(url, reference);
  }
    </script>
@endsection

