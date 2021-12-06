@extends('backend.layouts.master')

@section('title', 'This Year Expences')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">EXPENCES</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Expences</a></li>
         <li class="active">This Year Expences</li>
     </ol>
 </div>
</div>

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

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">Current Year Expences List Here <span class="badge pull-right">Total = {{ $expences_total }}</span></h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Details</th>
                                 <th>Amount</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($expenceses as $key => $expences)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $expences->details }}</td>
                                <td>{{ $expences->amount }}</td>
                                <td>
                                 	<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#edit-{{ $expences->id }}">Edit</a>
                                 	<a href="{{ route('destroy.expences', $expences->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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
@foreach($expenceses as $expences)
	<div class="modal fade" id="edit-{{ $expences->id }}" tabindex="-1" aria-labelledby="editLabel-{{ $expences->id }}" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header" style="display:flex;justify-content:space-between;">
	        <h5 class="modal-title" id="editLabel-{{ $expences->id }}">Update Your Expences</h5>
	        <button type="button" class="pull-right" data-dismiss="modal"><i class=" md-clear"></i></button>
	      </div>
	      <div class="modal-body">
	      	<form role="form" action="{{ route('update.expences', $expences->id) }}" method="POST">
            	@csrf
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea class="form-control" name="details" id="details" rows="5">{{ $expences->details }}</textarea>
                </div>
                
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" name="amount" class="form-control" id="amount" value="{{ $expences->amount }}">
                </div>

                <div class="form-group">
                    <input type="hidden" name="date" value="{{ date('d-m-Y') }}">
                    <input type="hidden" name="month" value="{{ date('m') }}">
                    <input type="hidden" name="year" value="{{ date('Y') }}">
                </div>

                <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Update</button>
            </form>
	      </div>
	    </div>
	  </div>
	</div>
@endforeach


@endsection