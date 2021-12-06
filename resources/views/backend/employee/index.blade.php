@extends('backend.layouts.master')

@section('title', 'All Employee')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">EMPLOYEES</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Employees</a></li>
         <li class="active">All Employee</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Employee Data Here</h3>
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
                                 <th>NID</th>
                                 <th>Address</th>
                                 <th>Image</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($employees as $key => $employee)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->nid }}</td>
                                <td>{{ $employee->address }}</td>
                                <td>
                                 	<img src="{{ asset('uploads/employee/'.$employee->photo) }}" alt="employee-image" style="width:60px;height:auto;">
                                </td>
                                <td>
                                 	<a href="" class="btn btn-sm btn-info" data-toggle="modal" data-target="#showemp-{{ $employee->id }}">view</a>
                                 	<a href="{{ route('edit.employee', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                 	<a href="{{ route('destroy.employee', $employee->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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


<!--========== Single Employee Data Show ==========-->
@foreach($employees as $employee)
	<div class="modal fade" id="showemp-{{ $employee->id }}" tabindex="-1" aria-labelledby="showempLabel-{{ $employee->id }}" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="display:flex;justify-content:space-between;">
	        <h5 class="modal-title" id="showempLabel-{{ $employee->id }}">{{ $employee->name }}'s Details</h5>
	        <button type="button" class="pull-right" data-dismiss="modal"><i class=" md-clear"></i></button>
	      </div>
	      <div class="modal-body">
	      	<div class="show_emp_details">
	      		<div class="emp_img">
	      			<img src="{{ asset('uploads/employee/'.$employee->photo) }}" alt="">
	      		</div>
	      		<table class="table table-striped">
	      			<tr>
	      				<th>Name</th>
	      				<td>:</td>
	      				<td>{{ $employee->name }}</td>
	      			</tr>

	      			<tr>
	      				<th>Email</th>
	      				<td>:</td>
	      				<td>{{ $employee->email }}</td>
	      			</tr>

	      			<tr>
	      				<th>Phone</th>
	      				<td>:</td>
	      				<td>{{ $employee->phone }}</td>
	      			</tr>

	      			<tr>
	      				<th>NID</th>
	      				<td>:</td>
	      				<td>{{ $employee->nid }}</td>
	      			</tr>

	      			<tr>
	      				<th>Address</th>
	      				<td>:</td>
	      				<td>{{ $employee->address }}</td>
	      			</tr>

	      			<tr>
	      				<th>City</th>
	      				<td>:</td>
	      				<td>{{ $employee->city }}</td>
	      			</tr>

	      			<tr>
	      				<th>Experience</th>
	      				<td>:</td>
	      				<td>{{ $employee->experience }}</td>
	      			</tr>

	      			<tr>
	      				<th>Salary</th>
	      				<td>:</td>
	      				<td>{{ $employee->salary }}</td>
	      			</tr>

	      			<tr>
	      				<th>Vacation</th>
	      				<td>:</td>
	      				<td>{{ $employee->vacation }}</td>
	      			</tr>
	      		</table>
	      	</div>
	      </div>
	    </div>
	  </div>
	</div>
@endforeach


@endsection