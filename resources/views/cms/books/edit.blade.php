@extends('cms.parent')

@section('title','Edit Book')

@section('styles')
@endsection

@section('main-title','Edit Book')

@section('sup-title','edit book')

@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Edit data of Book</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form>
              <div class="card-body">
                <div class="form-group col-md-12">
                    <label for="book">Name</label>
                    <input type="text" class="form-control" id="book"  name="book" placeholder=""  value={{$books->name }}>
                </div>
                <div class="form-group col-md-12">
                    <label for="date">DateOfIssue</label>
                    <input type="date" class="form-control" id="date"  name="date" placeholder="" value={{$books->date_of_issue }} >
                </div>

                <div class="form-group col-md-12">
                    <label for="status">Status</label>
                    <select  class="form-control" id="status" name="status" style="width:100%" aria-label=".form-select-sm example" value={{$books->status }}>
                  <option value="">Status</option>
                  <option value="Available">Available</option>
                  <option value="not Available">not Available</option>
                  </select>
                  </div>



              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="button" onclick="perfotmUpdate({{ $book->id }})" class="btn btn-primary">Update</button>
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
formData.append('date_of_issue',document.getElementByID(date_of_issue).value);
formData.append('status',document.getElementByID(status).value);
    storeRoute('/cms/admin/books_update/'+id,formData);
    }
    </script>
@endsection
