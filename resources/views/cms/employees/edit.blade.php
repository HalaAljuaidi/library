@extends('cms.parent')

@section('title','Edit Employee')

@section('styles')
@endsection

@section('main-title','Edit Employee')

@section('sup-title','edit employee')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit data of Employee</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group col-md-12">
                    <label for="employee">Name</label>
                  <input type="text" class="form-control" id="employee"   name="employee" placeholder=""  value={{$employees->name }}>
                </div>
                <div class="form-group col-md-12">
                    <label for="age">age</label>
                  <input type="number" class="form-control" id="age"  name="age" placeholder="" value={{$employees->age }} >
                </div>

                <div class="form-group col-md-12">
                    <label for="num">NumberOfHoursWork</label>
                    <input type="number" class="form-control" id="num" placeholder="" name="num" value={{$employees->number_of_hours_work }}>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="status">Status</label>
                    <select  class="form-control" id="status" name="status" style="width:100%" aria-label=".form-select-sm example" value={{$employees->status }}>
                  <option value="">Status</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  </select>
                  </div>

                  <div class="form-group col-md-6">
                    <label for="level">Level Of Education</label>
                    <select  class="form-control" id="level" name="level" style="width:100%" aria-label=".form-select-sm example" value={{$employees->level_of_education }} >
                  <option value="">Level Of Education</option>
                  <option value="Secondary">Secondary</option>
                  <option value="Bachelor">Bachelor</option>
                  <option value="Master">Master</option>
                  </select>
                  </div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="perfotmUpdate({{ $employee->id }})" class="btn btn-primary">Update</button>
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
formData.append('name',document.getElementByID(name).value);
formData.append('age',document.getElementByID(age).value);
formData.append('number_of_hours_work',document.getElementByID(number_of_hours_work).value);
formData.append('status',document.getElementByID(status).value);
formData.append('level_of_education',document.getElementByID(level_of_education).value);
formData.append('attendees',document.getElementByID(attendees).value);
    storeRoute('/cms/admin/employees_update/'+id,formData);
    }
    </script>
@endsection
