@extends('backend.layouts.master')

@section('title', 'All Supplier')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">Suppliers</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Supplier</a></li>
         <li class="active">All Supplier</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Supplier Data Here</h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Name</th>
                                 <th>Phone</th>
                                 <th>Address</th>
                                 <th>Shop</th>
                                 <th>Type</th>
                                 <th>Image</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($suppliers as $key => $supplier)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $supplier->name }}</td>
                                <td>{{ $supplier->phone }}</td>
                                <td>{{ $supplier->address }}</td>
                                <td>{{ $supplier->shop }}</td>
                                <td>
                                	@if($supplier->type == 'distributor')
                                		Distributor
                                	@elseif($supplier->type == 'wholeseller')
                                		Whole Seller
                                	@else
                                		Broker
                                	@endif
                                </td>
                                <td>
                                 	@if(!is_null($supplier->photo))
                                 		<img src="{{ asset('uploads/supplier/'.$supplier->photo) }}" alt="supplier-image" style="width:60px;height:auto;">
                                 	@else
                                 		<img src="{{ asset('uploads/supplier/default.jpg') }}" alt="supplier-image" style="width:60px;height:auto;">
                                 	@endif
                                </td>
                                <td>
                                 	<a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showemp-{{ $supplier->id }}">view</a>
                                 	<a href="{{ route('edit.supplier', $supplier->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                 	<a href="{{ route('destroy.supplier', $supplier->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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


<!--========== Single Supplier Data Show ==========-->
@foreach($suppliers as $supplier)
	<div class="modal fade" id="showemp-{{ $supplier->id }}" tabindex="-1" aria-labelledby="showempLabel-{{ $supplier->id }}" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="display:flex;justify-content:space-between;">
	        <h5 class="modal-title" id="showempLabel-{{ $supplier->id }}">{{ $supplier->name }}'s Details</h5>
	        <button type="button" class="pull-right" data-dismiss="modal"><i class=" md-clear"></i></button>
	      </div>
	      <div class="modal-body">
	      	<div class="show_emp_details">
	      		<div class="emp_img">
	      			@if(!is_null($supplier->photo))
	      				<img src="{{ asset('uploads/supplier/'.$supplier->photo) }}">
	      			@else
	      				<img src="{{ asset('uploads/supplier/default.jpg') }}">
	      			@endif
	      		</div>
	      		<table class="table table-striped">
	      			<tr>
	      				<th>Name</th>
	      				<td>:</td>
	      				<td>{{ $supplier->name }}</td>
	      			</tr>

	      			<tr>
	      				<th>Email</th>
	      				<td>:</td>
	      				<td>{{ $supplier->email }}</td>
	      			</tr>

	      			<tr>
	      				<th>Phone</th>
	      				<td>:</td>
	      				<td>{{ $supplier->phone }}</td>
	      			</tr>

	      			<tr>
	      				<th>Address</th>
	      				<td>:</td>
	      				<td>{{ $supplier->address }}</td>
	      			</tr>

	      			<tr>
	      				<th>City</th>
	      				<td>:</td>
	      				<td>{{ $supplier->city }}</td>
	      			</tr>

	      			<tr>
	      				<th>Shop</th>
	      				<td>:</td>
	      				<td>{{ $supplier->shop }}</td>
	      			</tr>

	      			<tr>
	      				<th>Type</th>
	      				<td>:</td>
	      				<td>{{ $supplier->type }}</td>
	      			</tr>

	      			<tr>
	      				<th>Account Holder</th>
	      				<td>:</td>
	      				<td>{{ $supplier->accountholder }}</td>
	      			</tr>

	      			<tr>
	      				<th>Account Number</th>
	      				<td>:</td>
	      				<td>{{ $supplier->accountnumber }}</td>
	      			</tr>

	      			<tr>
	      				<th>Bank Name</th>
	      				<td>:</td>
	      				<td>{{ $supplier->bankname }}</td>
	      			</tr>

	      			<tr>
	      				<th>Bank Branch</th>
	      				<td>:</td>
	      				<td>{{ $supplier->bankbranch }}</td>
	      			</tr>
	      		</table>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@endforeach


@endsection