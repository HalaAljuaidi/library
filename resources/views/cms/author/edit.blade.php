@extends('cms.parent')

@section('title' , 'Edit author')

@section('styles')

@endsection

@section('main-title' , 'Edit author')

@section('sub-title' , 'edit author')


@section('content')

<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-lg-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit Data of Author</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >

              <div class="card-body">

                <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Author Name</label>
                  <input type="text" class="form-control" name="name" id="name"
                  value="{{ $authors->name }}" placeholder="Enter Name of author">
                </div>
                <div class="form-group col-md-6">
                    <label for="date_of_birth"> Date of  Birth</label>
                    <input type="date" class="form-control" name="date_of_birth" id="date_of_birth" placeholder="Enter Password of author" value="{{$authors->date_of_birth}}">
                  </div>

                </div>
                <div class="row">
                <div class="form-group col-md-6">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email"
                    value="{{$authors->email}}" placeholder="Enter Email of author">
                  </div>
               <div class="form-group col-md-6">
                  <label for="password">Password</label>
                  <input type="password" class="form-control" name="password" id="password" placeholder="Enter Password of author" value="{{$authors->password}}">
                </div>
                </div>
                 <div class="row">
                <div class="form-group col-md-6">
                    <label for="status"> Status</label>
                    <select class="form-control" name="status" style="width: 100%;"
                        id="status" aria-label=".form-select-sm example">
                          <option selected> {{ $authors->status }} </option>
                          <option value="Active"> Active </option>
                          <option value="InActive"> InActive </option>

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="mobile">Mobile</label>
                    <input type="string" class="form-control" name="mobile" id="mobile"
                    value="{{ $authors->mobile}}" placeholder="Enter Mobile of Author">
                  </div>

                </div>




              <!-- /.card-body -->

              <div class="card-footer">
                <a href="#" type="button"    onclick="performUpdate({{ $authors->id }})"  class="btn btn-primary">Update</a>
                <a href="{{ route('authors.index') }}" type="button" class="btn btn-primary">Return Back</a>

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
    formData.append('name',document.getElementById('name').value);
    formData.append('mobile',document.getElementById('mobile').value);
    formData.append('status',document.getElementById('status').value);
    formData.append('date_of_birth',document.getElementById('date_of_birth').value);
    formData.append('email',document.getElementById('email').value);
    formData.append('password',document.getElementById('password').value);
    storeRoute('/cms/admin/update_authors/'+id , formData);

  }
  </script>
@endsection
