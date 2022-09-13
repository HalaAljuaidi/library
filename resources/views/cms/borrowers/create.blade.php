@extends('cms.parent')

@section('title','Create Borrower')

@section('styles')
@endsection

@section('main-title','Create Borrower')

@section('sup-title','create borrower')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create data of Borrower</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              <div class="card-body">
                <div class="form-group col-md-12">
                  <label for="borrower">Name</label>
                  <input type="text" class="form-control" id="borrower" placeholder="Enter Borrower Name" name="borrower">
                </div>
                <div class="form-group col-md-12">
                  <label for="age">Age</label>
                  <input type="number" class="form-control" id="age" placeholder="Age" name="age">
                </div>

                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                  </div>

                  <div class="form-group col-md-12">
                    <label for="mobile">Mobile</label>
                    <input type="tel" class="form-control" id="mobile" placeholder="Mobile" name="mobile">
                  </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button  type="button" onclick="perfotmStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('borrowers.index') }}" type="submit" class="btn btn-success">index of borrower</a>
              </div>
            </form>
          </div>
        </section>

          @endsection

@endsection

@section('scripts')
<script>
function perfotmStore(){
let formData=new FormData;
formData.append('name',document.getElementByID(name).value);
formData.append('age',document.getElementByID(age).value);
formData.append('email',document.getElementByID(email).value);
formData.append('mobile',document.getElementByID(mobile).value);
store('/cms/admin/borrowers',formData);
}
</script>
@endsection
