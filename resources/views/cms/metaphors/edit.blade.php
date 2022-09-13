@extends('cms.parent')

@section('title','Edit Metaphor')

@section('styles')
@endsection

@section('main-title','Edit Metaphor')

@section('sup-title','edit metaphor')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit data of Metaphor</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group col-md-12">
                    <label for="time">Time</label>
                  <input type="time" class="form-control" id="time" name="time" placeholder=""  value={{$metaphors->time }}>
                </div>
                <div class="form-group col-md-12">
                    <label for="date">Date</label>
                    <input type="date" class="form-control" id="date"  name="date" placeholder="" value={{$metaphors->date }} >
                </div>

                <div class="form-group col-md-12">
                    <label for="return">ReturnDate</label>
                    <input type="date" class="form-control" id="return" placeholder="" name="return" value={{$metaphors->return_date }}>
                  </div>


              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="perfotmUpdate({{ $metaphor->id }})" class="btn btn-primary">Update</button>
              </div>
            </form>
          </div>
        </section>

          @endsection

@endsection

@section('scripts')
<script>
    function perfotmUpdate(id){
    let formData=new FormData;
    formData.append('time',document.getElementByID(time).value);
formData.append('date',document.getElementByID(date).value);
formData.append('return_date',document.getElementByID(return_date).value);
    storeRoute('/cms/admin/metaphors_update/'+id,formData);
    }
    </script>
@endsection
