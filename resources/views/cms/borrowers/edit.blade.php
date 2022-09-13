@extends('cms.parent')

@section('title','Edit Borrower')

@section('styles')
@endsection

@section('main-title','Edit Borrower')

@section('sup-title','edit borrower')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit data of Borrower</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group col-md-12">
                    <label for="borrower">Name</label>
                    <input type="text" class="form-control" id="borrower"  name="borrower" placeholder=""  value={{$borrowers->name }}>
                </div>
                <div class="form-group col-md-12">
                    <label for="age">Age</label>
                    <input type="text" class="form-control" id="age"  name="age" placeholder="" value={{$borrowers->age }} >
                </div>

                <div class="form-group col-md-12">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" placeholder="" name="email" value={{$borrowers->email }}>
                  </div>

                  <div class="form-group col-md-12">
                    <label for="mobile">Mobile</label>
                    <input type="text" class="form-control" id="mobile" placeholder="" name="mobile" value={{$borrowers->mobile }}>
                  </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="perfotmUpdate({{ $borrower->id }})" class="btn btn-primary">Update</button>
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
formData.append('email',document.getElementByID(email).value);
formData.append('mobile',document.getElementByID(mobile).value);
    storeRoute('/cms/admin/borrowers_update/'+id,formData);
    }
    </script>
@endsection
