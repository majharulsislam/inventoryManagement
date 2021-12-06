@extends('backend.layouts.master')

@section('title', 'Category')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">CATEGORY</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Category</a></li>
         <li class="active">Category Preview</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Category Record Here! <span class="btn btn-sm btn-primary pull-right waves-effect waves-light" data-toggle="modal" data-target="#addcategory">Add New</span></h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <!-- Error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class=" md-clear"></i>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Category Name</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($categories as $key => $category)
                             <tr>
                             	<td>{{ $key+1 }}</td>
                             	<td>{{ $category->categoryname }}</td>
                             	<td>
                             		<span class="btn btn-sm btn-info" data-toggle="modal" data-target="#editcategory-{{ $category->id }}">Edit</span>
                             		<a href="{{ route('destroy.category', $category->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                             	</td>
                             </tr>
                           @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div> <!-- End Row -->


<!--========== Single Add new category modal ==========-->
    <div class="modal fade" id="addcategory" tabindex="-1" aria-labelledby="categoryLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display:flex;justify-content:space-between;">
            <h5 class="modal-title" id="categoryLabel">Add New Category</h5>
            <button type="button" class="pull-right" data-dismiss="modal"><i class="md-clear"></i></button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{ route('store.category') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="categoryname">Category Name</label>
                    <input type="text" name="categoryname" id="categoryname" class="form-control" placeholder="Enter category name" required>
                </div>

                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>


<!--========== Single edit category modal ==========-->
  @foreach($categories as $category)
    <div class="modal fade" id="editcategory-{{ $category->id }}" tabindex="-1" aria-labelledby="editcategoryLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display:flex;justify-content:space-between;">
            <h5 class="modal-title" id="editcategoryLabel">Edit Category</h5>
            <button type="button" class="pull-right" data-dismiss="modal"><i class="md-clear"></i></button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{ route('update.category', $category->id) }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="categoryname">Category Name</label>
                    <input type="text" name="categoryname" id="categoryname" class="form-control" value="{{ $category->categoryname }}" required>
                </div>

                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
   @endforeach


@endsection