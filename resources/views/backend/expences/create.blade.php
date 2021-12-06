@extends('backend.layouts.master')

@section('title', 'Add New Expences')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">ADD EXPENCES</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Expences</a></li>
	         <li class="active">Add New Expences</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
        <div class="col-md-1"></div>
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add New Expences Here</h3></div>
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

                <div class="panel-body">
                    <form role="form" action="{{ route('store.expences') }}" method="POST">
                    	@csrf
                        <div class="form-group">
                            <label for="details">Details</label>
                            <textarea class="form-control" name="details" id="details" rows="5" placeholder="Enter expenceses details"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" name="amount" class="form-control" id="amount" placeholder="Enter amount">
                        </div>

                        <div class="form-group">
                            <input type="hidden" name="date" value="{{ date('d-m-Y') }}">
                            <input type="hidden" name="month" value="{{ date('m') }}">
                            <input type="hidden" name="year" value="{{ date('Y') }}">
                        </div>

                        <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Submit</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div>
	</div>



@endsection