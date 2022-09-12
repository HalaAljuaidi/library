@extends('cms.parent')

@section('title' , 'Edit Store')

@section('styles')

@endsection

@section('main-title' , 'Edit Store')

@section('sub-title' , 'Edit store')


@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of store</h3>
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
                  <input type="text" class="form-control" name="title" id="title"  placeholder="Enter title of store"   value="{{ $stores->title }}">
                </div>



              <!-- /.card-body -->


              <div class="card-footer">
                <a href="#" type="button"    onclick="performUpdate({{ $stores->id }})"  class="btn btn-primary">Update</a>
                <a href="{{ route('stores.index') }}" type="button" class="btn btn-primary">Return Back</a>
                 </div>
            </form>
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

  function performUpdate(id){
    let formData = new FormData();
    formData.append('title',document.getElementById('title').value);
    formData.append('library_id',document.getElementById('library_id').value);
    storeRoute('/cms/admin/stores_update/'+id,formData);

  }
  </script>
@endsection


