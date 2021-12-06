@extends('backend.layouts.master')

@section('title', 'Add New Supplier')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">ADD SUPPLIER</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Supplier</a></li>
	         <li class="active">Add New Supplier</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">New Supplier Here</h3></div>
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
                    <form role="form" action="{{ route('store.supplier') }}" method="POST" enctype="multipart/form-data">
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
                            <label for="shop">Shop Name</label>
                            <input type="text" name="shop" class="form-control" id="shop" placeholder="Enter shop">
                        </div>

                        <div class="form-group">
                            <label for="type">type</label>
                            <select name="type" class="form-control" id="type">
                                <option value="">— Select —</option>
                                <option value="distributor">Distributor</option>
                                <option value="wholeseller">Whole Seller</option>
                                <option value="broker">broker</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="accountholder">Account Holder</label>
                            <input type="text" name="accountholder" class="form-control" id="accountholder" placeholder="Enter account holder">
                        </div>

                        <div class="form-group">
                            <label for="accountnumber">Account Number</label>
                            <input type="text" name="accountnumber" class="form-control" id="accountnumber" placeholder="Enter account number">
                        </div>

                        <div class="form-group">
                            <label for="bankname">Banak Name</label>
                            <input type="text" name="bankname" class="form-control" id="bankname" placeholder="Enter bank name">
                        </div>

                        <div class="form-group">
                            <label for="bankbranch">Bank Branch</label>
                            <input type="text" name="bankbranch" class="form-control" id="bankbranch" placeholder="Enter bank branch">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" placeholder="Enter city">
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