@extends('cms.parent')
@section('TITLE','Create library')
@section('main-title','Create library')
@section('sub-title','data of library')

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
              <h3 class="card-title">Create Data of library</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group  col-md-12">
                  <label for="name">library Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter library Name">
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                      <label>Manager</label>
                      <select class="form-control select2"  name="manager_id" style="width: 100%;"  id="manager_id">
                        @foreach ($managers as $manager)
                            <option value="{{ $manager->id }}">{{ $manager->managerName }}</option>
                        @endforeach
                         </select>
         </div>
        </div>
                <div class="card-body">
                    <div class="form-group  col-md-12">
                      <label for="open_time">Open time</label>
                      <input type="time" class="form-control" id="open_time" name="open_time" placeholder="Enter Open Time">
                    </div>
                    <div class="card-body">
                        <div class="form-group  col-md-12">
                          <label for="close_time">Close Time</label>
                          <input type="time" class="form-control" id="close_time" name="close_time" placeholder="Enter Close Time">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="discription"> Description of Libarary</label>
                                <textarea class="form-control" style="resize: none;" id="discription"
                                    name="discription" rows="4" placeholder="Enter full description of library" cols="50"></textarea>
                            </div>
                        </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <a href="#" type="button"  onclick="performStore()" class="btn btn-primary">Store</a>
                <a href="{{ route('libraries.index') }}" type="button" class="btn btn-primary">Return Back</a>

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
  formData.append('name',document.getElementById('name').value);
  formData.append('open_time',document.getElementById('open_time').value);
  formData.append('close_time',document.getElementById('close_time').value);
  formData.append('discription',document.getElementById('discription').value);
  formData.append('manager_id',document.getElementById('manager_id').value);
  store('/cms/admin/libraries' , formData);

}
</script>
@endsection





