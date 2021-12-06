@extends('backend.layouts.master')

@section('title', 'All Attendence Report')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">ALL ATTENDENCE</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Attendence Report</a></li>
         <li class="active">All Attendence</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Employee Attendence Report Here <span class="pull-right text-success">Date: {{ date('d-m-Y') }}</span></h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Attendence Date</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($attendences as $key => $attendence)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $attendence->edit_date }}</td>
                                <td>
                                 	<a href="" class="btn btn-sm btn-primary">Edit</a>
                                 	<a href="" id="delete" class="btn btn-sm btn-danger">Delete</a>
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


@endsection