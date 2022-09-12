@extends('cms.parent')
@section('TITLE','Create Author')
@section('main-title','Create Author')
@section('sub-title','data of author')

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
              <h3 class="card-title">Create Data of author</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="row">

                <div class="form-group  col-md-6">
                  <label for="name">Author Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="Enter Author Name">
                </div>
                <div class="form-group  col-md-6">
                    <label for="date_of_birth">date of  birth</label>
                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" placeholder="Enter Yor  Birth of    date">
                  </div>

                    </div>
                </div>



                    <div class="card-body">
                        <div class="row">
                            <div class="form-group  col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your Eamil">
                              </div>
                        <div class="form-group  col-md-6">
                              <label for="password">Password</label>
                              <input type="password" class="form-control" id="password" name="password" placeholder="Enter Yor  Passeword">
                            </div>


                                <!-- /.form-group -->

                            </div>
                            <div class="card-body">
                                <div class="row">
                            <div class="form-group  col-md-6">
                                  <label for="mobile">Mobile</label>
                                  <input type="text" class="form-control" id="mobile" name="mobile" placeholder="Enter Your Password">
                                </div>
                    <div class="form-group col-md-6">
                        <label  for="status">Status</label>
                        <select class="form-control " style="width: 100%;"  id="status" name="status"   aria-label=".form-select-sm  example">
                          <option value="Active">Active</option>
                          <option   value="InActive">InActive</option>

                        </select>
                      </div>

                </div>
            </div>







              <!-- /.card-body -->

              <div class="card-footer">
                <button  type="button" onclick="performStore()"    class="btn btn-primary">Store</button>
              </div>
            </form>
          </div>

        <!--/.col (right) -->
      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
  </section>
@endsection

@section('scripts')

<script>

    function performStore() {
            let formData=new FormData();
            formData.append('name',document.getElementById('name').value);
            formData.append('mobile',document.getElementById('mobile').value);
            formData.append('email',document.getElementById('email').value);
            formData.append('password',document.getElementById('password').value);
            formData.append('date_of_birth',document.getElementById('date_of_birth').value);
            formData.append('status',document.getElementById('status').value);

            store('/cms/admin/authors',formData);


        }
</script>
@endsection
