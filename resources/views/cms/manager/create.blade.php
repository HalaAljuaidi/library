@extends('cms.parent')

@section('title' , 'Create Manager')

@section('styles')

@endsection

@section('main-title' , 'Create Manager')

@section('sub-title' , 'create manager')


@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create Data of Manager</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >

              <div class="card-body">
                <div class="row">
                {{-- <div class="form-group col-md-4">
                    <label for="country_id"> Country Name</label>
                    <select class="form-control" name="country_id" style="width: 100%;"
                        id="country_id" aria-label=".form-select-sm example">
                        @foreach ($countries as $country )
                            <option value="{{ $country->id }}" >{{ $country->country_name }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group col-md-6">
                  <label for="managerName">Manager Name</label>
                  <input type="text" class="form-control" name="managerName" id="managerName" placeholder="Enter Name of manager">
                </div>
                <div class="form-group col-md-6">
                    <label for="age">Age</label>
                    <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age of manager">
                  </div>

                </div>
                <div class="row">

                   <div class="form-group col-md-6">
                  <label for="mobile">Mobile</label>
                  <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Enter mobile of manager">
                </div>
                <div class="form-group col-md-6">
                    <label for="address"> Address</label>
                    <input type="text" class="form-control" name="address" id="address" placeholder="Enter Address of manager">
                  </div>

                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter Email of manager">
                  </div>
                  <div class="form-group col-md-6">

                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password of manager">
                </div>

                </div>
                 <div class="row">
                <div class="form-group col-md-12">
                    <label for="gender"> Gender</label>
                    <select class="form-control" name="gender" style="width: 100%;"
                        id="gender" aria-label=".form-select-sm example">
                          <option value=""> All </option>
                          <option value="male"> Male </option>
                          <option value="female"> Female </option>

                    </select>
                </div>


                </div>




              <!-- /.card-body -->

              <div class="card-footer">
                <a href="#" type="button"  onclick="performStore()" class="btn btn-primary">Store</a>
                <a href="{{ route('managers.index') }}" type="button" class="btn btn-primary">Return Back</a>

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
    formData.append('managerName',document.getElementById('managerName').value);
    formData.append('age',document.getElementById('age').value);
    formData.append('mobile',document.getElementById('mobile').value);
    formData.append('gender',document.getElementById('gender').value);
    formData.append('email',document.getElementById('email').value);
    formData.append('password',document.getElementById('password').value);
    formData.append('address',document.getElementById('address').value);

    store('/cms/admin/managers' , formData);

  }
  </script>
@endsection
