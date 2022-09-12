@extends('cms.parent')
@section('TITLE','Create Section')
@section('main-title','Create Section')
@section('sub-title','data of section')

@section('styles')

@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Data of section</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group  col-md-12">
                  <label for="name">section Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter section Name">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Store Title</label>
                      <select class="form-control select2"  name="store_id" style="width: 100%;"  id="store_id">
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}">{{ $store->title }}</option>
                        @endforeach
                         </select>
         </div>
        </div>

              <!-- /.card-body -->

              <div class="card-footer">
                <a href="#" type="button"  onclick="performStore()" class="btn btn-primary">Store</a>
                <a href="{{ route('sections.index') }}" type="button" class="btn btn-primary">Return Back</a>

              </div>
            </form>
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
//   formData.append('name',document.getElementById('name').value);
  formData.append('store_id',document.getElementById('store_id').value);
  store('/cms/admin/sections' , formData);

}
</script>
@endsection





