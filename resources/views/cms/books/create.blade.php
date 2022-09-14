@extends('cms.parent')

@section('title','Create Book')

@section('styles')
@endsection

@section('main-title','Create Book')

@section('sup-title','create book')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Create data of Book</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form >
              <div class="card-body">
                <div class="form-group col-md-12">
                  <label for="book">Name</label>
                  <input type="text" class="form-control" id="book" placeholder="Enter Book Name" name="book">
                </div>
                <div class="form-group col-md-12">
                  <label for="status">Status</label>
                  <select  class="form-control" id="status" name="status" style="width:100%" aria-label=".form-select-sm example">
                <option value="">Status</option>
                <option value="Available">Available</option>
                <option value="not Available">not Available</option>
                </select>
                </div>

                <div class="form-group col-md-12">
                    <label for="date">DateOfIssue</label>
                    <input type="date" class="form-control" id="date" placeholder="Date Of Issue" name="date">
                  </div>

              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button  type="button" onclick="perfotmStore()" class="btn btn-primary">Store</button>
                <a href="{{ route('books.index') }}" type="submit" class="btn btn-success">index of Book</a>
              </div>
            </form>
          </div>
        </section>

          @endsection



@section('scripts')
<script>
function perfotmStore(){
let formData=new FormData;
formData.append('name',document.getElementByID(name).value);
formData.append('date_of_issue',document.getElementByID(date_of_issue).value);
formData.append('status',document.getElementByID(status).value);
store('/cms/admin/books',formData);
}
</script>
@endsection
