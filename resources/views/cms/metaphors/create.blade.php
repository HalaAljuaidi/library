@extends('cms.parent')

@section('title','Create Metaphor')

@section('styles')
@endsection

@section('main-title','Create Metaphor')

@section('sup-title','create metaphor')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create data of Metaphor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              <div class="card-body">
                <div class="form-group col-md-12">
                  <label for="time">Time</label>
                  <input type="time" class="form-control" id="time" placeholder="Enter time" name="time">
                </div>
                <div class="form-group col-md-12">
                  <label for="date">Date</label>
                  <input type="date" class="form-control" id="date" placeholder="Enter Date" name="date">
                </div>

                <div class="form-group col-md-12">
                    <label for="return">ReturnDate</label>
                    <input type="date" class="form-control" id="return" placeholder="Return Date" name="return">
                  </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button  type="button" onclick="perfotmStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('metaphors.index') }}" type="submit" class="btn btn-success">index of Metaphor</a>
              </div>
            </form>
          </div>
        </section>

          @endsection



@section('scripts')
<script>
function perfotmStore(){
let formData=new FormData;
formData.append('time',document.getElementByID(time).value);
formData.append('date',document.getElementByID(date).value);
formData.append('return_date',document.getElementByID(return_date).value);
store('/cms/admin/metaphors',formData);
}
</script>
@endsection
