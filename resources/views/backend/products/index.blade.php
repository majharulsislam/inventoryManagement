@extends('backend.layouts.master')

@section('title', 'Product List')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">PRODUCTS</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Product</a></li>
         <li class="active">Product List</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Product Data Here</h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Name</th>
                                 <th>Code</th>
                                 <th>Image</th>
                                 <th>Category</th>
                                 <th>Selling Price</th>
                                 <th>Self</th>
                                 <th>Route</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($products as $key => $product)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td>{{ $product->product_code }}</td>
                                <td>
                                    <img src="{{ asset('uploads/products/'.$product->product_img) }}" style="width:40px; height: auto;">
                                </td>
                                <td>{{ $product->category->categoryname }}</td>
                                <td>{{ $product->selling_price }}</td>
                                <td>{{ $product->product_self }}</td>
                                <td>{{ $product->product_route }}</td>
                                <td>
                                    <a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showProduct-{{ $product->id }}">View</a>
                                    <a href="{{ route('edit.product',$product->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="{{ route('destroy.product', $product->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
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


<!-- Single view product modal here -->
@foreach($products as $product)
    <div class="modal fade" id="showProduct-{{ $product->id }}" tabindex="-1" aria-labelledby="showLabel-{{ $product->id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display:flex;justify-content:space-between;">
            <h5 class="modal-title" id="showLabel-{{ $product->id }}">Product Details</h5>
            <button type="button" class="pull-right" data-dismiss="modal"><i class=" md-clear"></i></button>
          </div>
          <div class="modal-body">
            <div class="show_emp_details">
                <div class="emp_img">
                    <img src="{{ asset('uploads/products/'.$product->product_img) }}" style="width:150px;height:auto;">
                </div>
                <table class="table table-striped">
                    <tr>
                        <th>Name</th>
                        <td>:</td>
                        <td>{{ $product->product_name }}</td>
                    </tr>
                    <tr>
                        <th>Product Code</th>
                        <td>:</td>
                        <td>{{ $product->product_code }}</td>
                    </tr>
                    <tr>
                        <th>Category</th>
                        <td>:</td>
                        <td>{{ $product->category->categoryname }}</td>
                    </tr>
                    <tr>
                        <th>Supplier</th>
                        <td>:</td>
                        <td>{{ $product->supplier->name }}</td>
                    </tr>
                    <tr>
                        <th>Product Self/Gadoun</th>
                        <td>:</td>
                        <td>{{ $product->product_self }}</td>
                    </tr>
                    <tr>
                        <th>Product Route</th>
                        <td>:</td>
                        <td>{{ $product->product_route }}</td>
                    </tr>
                    <tr>
                        <th>Buying Price</th>
                        <td>:</td>
                        <td>{{ $product->buying_price }}</td>
                    </tr>
                    <tr>
                        <th>Selling Price</th>
                        <td>:</td>
                        <td>{{ $product->selling_price }}</td>
                    </tr>
                    <tr>
                        <th>Buy Date</th>
                        <td>:</td>
                        <td>{{ $product->buy_date }}</td>
                    </tr>
                    <tr>
                        <th>Expire Date</th>
                        <td>:</td>
                        <td>{{ $product->expire_date }}</td>
                    </tr>
                </table>
            </div>
          </div>
        </div>
      </div>
    </div>
@endforeach


@endsection