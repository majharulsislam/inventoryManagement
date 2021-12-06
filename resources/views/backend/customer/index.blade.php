@extends('backend.layouts.master')

@section('title', 'All Customer')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">Customers</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Customer</a></li>
         <li class="active">All Customer</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Customer Data Here</h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Name</th>
                                 <th>Email</th>
                                 <th>Phone</th>
                                 <th>Address</th>
                                 <th>Shopname</th>
                                 <th>Image</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($customers as $key => $customer)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $customer->name }}</td>
                                <td>{{ $customer->email }}</td>
                                <td>{{ $customer->phone }}</td>
                                <td>{{ $customer->address }}</td>
                                <td>{{ $customer->shopname }}</td>
                                <td>
                                 	@if(!is_null($customer->photo))
                                 		<img src="{{ asset('uploads/customer/'.$customer->photo) }}" alt="customer-image" style="width:60px;height:auto;">
                                 	@else
                                 		<img src="{{ asset('uploads/customer/default.jpg') }}" alt="customer-image" style="width:60px;height:auto;">
                                 	@endif
                                </td>
                                <td>
                                 	<a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showemp-{{ $customer->id }}">view</a>
                                 	<a href="{{ route('edit.customer', $customer->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                 	<a href="{{ route('destroy.customer', $customer->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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


<!--========== Single Customer Data Show ==========-->
@foreach($customers as $customer)
	<div class="modal fade" id="showemp-{{ $customer->id }}" tabindex="-1" aria-labelledby="showempLabel-{{ $customer->id }}" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="display:flex;justify-content:space-between;">
	        <h5 class="modal-title" id="showempLabel-{{ $customer->id }}">{{ $customer->name }}'s Details</h5>
	        <button type="button" class="pull-right" data-dismiss="modal"><i class=" md-clear"></i></button>
	      </div>
	      <div class="modal-body">
	      	<div class="show_emp_details">
	      		<div class="emp_img">
	      			@if(!is_null($customer->photo))
	      				<img src="{{ asset('uploads/customer/'.$customer->photo) }}">
	      			@else
	      				<img src="{{ asset('uploads/customer/default.jpg') }}">
	      			@endif
	      		</div>
	      		<table class="table table-striped">
	      			<tr>
	      				<th>Name</th>
	      				<td>:</td>
	      				<td>{{ $customer->name }}</td>
	      			</tr>

	      			<tr>
	      				<th>Email</th>
	      				<td>:</td>
	      				<td>{{ $customer->email }}</td>
	      			</tr>

	      			<tr>
	      				<th>Phone</th>
	      				<td>:</td>
	      				<td>{{ $customer->phone }}</td>
	      			</tr>

	      			<tr>
	      				<th>Address</th>
	      				<td>:</td>
	      				<td>{{ $customer->address }}</td>
	      			</tr>

	      			<tr>
	      				<th>City</th>
	      				<td>:</td>
	      				<td>{{ $customer->city }}</td>
	      			</tr>

	      			<tr>
	      				<th>Shop Name</th>
	      				<td>:</td>
	      				<td>{{ $customer->shopname }}</td>
	      			</tr>

	      			<tr>
	      				<th>Account Holder</th>
	      				<td>:</td>
	      				<td>{{ $customer->accountholder }}</td>
	      			</tr>

	      			<tr>
	      				<th>Account Number</th>
	      				<td>:</td>
	      				<td>{{ $customer->accountnumber }}</td>
	      			</tr>

	      			<tr>
	      				<th>Bank Name</th>
	      				<td>:</td>
	      				<td>{{ $customer->bankname }}</td>
	      			</tr>

	      			<tr>
	      				<th>Bank Branch</th>
	      				<td>:</td>
	      				<td>{{ $customer->bankbranch }}</td>
	      			</tr>
	      		</table>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@endforeach


@endsection