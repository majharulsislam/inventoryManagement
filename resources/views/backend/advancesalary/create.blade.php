@extends('backend.layouts.master')

@section('title', 'Add New Employee')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">ADVANCE SALARY</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Salary</a></li>
	         <li class="active">Add Advance Salary</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
        <div class="col-md-1"></div>
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Add Advance Salary Here</h3></div>
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
                    <form role="form" action="{{ route('store.advancesalary') }}" method="POST">
                    	@csrf
                        <div class="form-group">
                            <label for="emp_id">Employee Name</label>
                            <select name="emp_id" id="emp_id" class="form-control">
                                <option value="">— Select —</option>
                                @foreach($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="advancesalary">Advance Amount</label>
                            <input type="number" name="advancesalary" id="advancesalary" class="form-control" placeholder="Enter advance amount">
                        </div>

                        <div class="form-group">
                            <label for="month">Month</label>
                            <select name="month" id="month" class="form-control">
                                <option value="">— Select —</option>
                                <option value="January">January</option>
                                <option value="February">February</option>
                                <option value="March">March</option>
                                <option value="April">April</option>
                                <option value="May">May</option>
                                <option value="Jun">Jun</option>
                                <option value="July">July</option>
                                <option value="August">August</option>
                                <option value="September">September</option>
                                <option value="October">October</option>
                                <option value="November">November</option>
                                <option value="December">December</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="year">Year</label>
                            <input type="number" name="year" id="year" class="form-control" placeholder="Enter year">
                        </div>

                        <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Submit</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div>
	</div>




@endsection