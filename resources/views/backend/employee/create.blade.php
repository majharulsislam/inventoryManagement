@extends('backend.layouts.master')

@section('title', 'Add New Employee')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">ADD EMPLOYEES</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Employees</a></li>
	         <li class="active">Add New Employee</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">New Employee Here</h3></div>
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
                    <form role="form" action="{{ route('store.employee') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Enter name">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" placeholder="Enter phone">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" placeholder="Enter address">
                        </div>

                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter experience">
                        </div>

                        <div class="form-group">
                            <label for="salary">Salary</label>
                            <input type="text" name="salary" class="form-control" id="salary" placeholder="Enter salary">
                        </div>

                        <div class="form-group">
                            <label for="vacation">Vacation</label>
                            <input type="text" name="vacation" class="form-control" id="vacation" placeholder="Enter vacation">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter city">
                        </div>

                        <div class="form-group">
                            <label for="nid">NID No.</label>
                            <input type="number" name="nid" class="form-control" id="nid" placeholder="Enter nid no">
                        </div>

                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="photo">Image</label>
                            <input type="file" name="photo" class="form-control upload" id="photo" accept="image/*" onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Submit</button>
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