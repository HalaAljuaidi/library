@extends('cms.parent')
@section('TITLE','Edit Section')
@section('main-title','Edit Section')
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
              <h3 class="card-title">Edit Data of section</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group  col-md-12">
                  <label for="name">section Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter section Name"    value="{{ $sections->name }}">
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
                <a href="#" type="button"    onclick="performUpdate({{ $sections->id }})"  class="btn btn-primary">Update</a>
                <a href="{{ route('sections.index') }}" type="button" class="btn btn-primary">Return Back</a>
                 </div>
            </form>
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
    function  performUpdate(id){

        let formData=new FormData();
        formData.append('name',document.getElementById('name').value);
        formData.append('store_id',document.getElementById('store_id').value);
        storeRoute('/cms/admin/sections_update/'+id,formData);

    }
</script>

@endsection
