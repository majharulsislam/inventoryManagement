@extends('backend.layouts.master')

@section('title', 'Edit Employee')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">EMPLOYEES</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Employees</a></li>
	         <li class="active">Edit Employee</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Edit Employee Here</h3></div>
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
                    <form role="form" action="{{ route('update.employee',$employee->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $employee->name }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $employee->email }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $employee->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ $employee->address }}">
                        </div>

                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" name="experience" class="form-control" id="experience" value="{{ $employee->experience }}">
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" class="form-control" id="salary" value="{{ $employee->salary }}">
                        </div>

                        <div class="form-group">
                            <label for="vacation">Vacation</label>
                            <input type="text" name="vacation" class="form-control" id="vacation" value="{{ $employee->vacation }}">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ $employee->city }}">
                        </div>

                        <div class="form-group">
                            <label for="nid">NID No.</label>
                            <input type="number" name="nid" class="form-control" id="nid" value="{{ $employee->nid }}">
                        </div>

                        <div class="form-group">
                            <label>Old Photo: </label>
                            <img src="{{ asset('uploads/employee/'.$employee->photo) }}" style="width:80px; height: auto;">
                        </div>

                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="photo">Image</label>
                            <input type="file" name="photo" class="form-control upload" id="photo" accept="image/*" onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Update</button>
                    </form>
                </div><!-- panel-body -->
            </div> <!-- panel -->
        </div>
	</div>


<!-- This code for show input image when select any image from form -->
<script type="text/javascript">
	function readURL(input){
		if(input.files && input.files[0]){
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#image')
				.attr('src', e.target.result)
				.width(80)
				.height('auto');
			}
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>

@endsection