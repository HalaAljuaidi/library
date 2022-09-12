@extends('cms.parent')

@section('title' , 'Create Store')

@section('styles')

@endsection

@section('main-title' , 'Create Store')

@section('sub-title' , 'create store')


@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Data of store</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              <div class="card-body">
                <div class="form-group col-md-12">
                    <label for="library_id"> Library Name</label>
                    <select class="form-control" name="library_id" style="width: 100%;"
                        id="library_id" aria-label=".form-select-sm example">
                        @foreach ($libraries as $library )
                            <option value="{{ $library->id }}" >{{ $library->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group">
                  <label for="title">Title </label>
                  <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title of store">
                </div>



              <!-- /.card-body -->

              <div class="card-footer">
                <a href="#" type="button" onclick="performStore()"  class="btn btn-primary">Store</a>
                <a href="{{ route('stores.index') }}" type="button" class="btn btn-primary">Return Back</a>

              </div>
            </form>
          </div>
          <!-- /.card -->

            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('scripts')

<script>

  function performStore(){
    let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('library_id',document.getElementById('library_id').value);
    store('/cms/admin/stores' , formData);

  }
  </script>
@endsection
