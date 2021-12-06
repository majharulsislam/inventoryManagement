@extends('backend.layouts.master')

@section('title', 'Add New Product')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">ADD PRODUCTS</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Products</a></li>
	         <li class="active">Add New Product</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">New Product Add Here</h3></div>
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
                    <form role="form" action="{{ route('store.product') }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" placeholder="Enter product name">
                        </div>
                        
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" name="product_code" class="form-control" id="product_code" placeholder="IN321123">
                        </div>

                        <div class="form-group">
                            <label for="cate_id">Category</label>
                            <select name="cate_id" id="cate_id" class="form-control">
                            	<option value="">— Select —</option>
                            	@foreach($categories as $category)
                            		<option value="{{ $category->id }}">{{ $category->categoryname }}</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="supply_id">Supplier</label>
                            <select name="supply_id" id="supply_id" class="form-control">
                            	<option value="">— Select —</option>
                            	@foreach($suppliers as $supplier)
                            		<option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_self">Product Self</label>
                            <input type="text" name="product_self" class="form-control" id="product_self" placeholder="Enter product self">
                        </div>

                        <div class="form-group">
                            <label for="product_route">Product Route</label>
                            <input type="text" name="product_route" class="form-control" id="product_route" placeholder="Enter product route">
                        </div>

                        <div class="form-group">
                            <label for="buy_date">Buy Date</label>
                            <input type="date" name="buy_date" class="form-control" id="buy_date" placeholder="Enter buy date">
                        </div>

                        <div class="form-group">
                            <label for="expire_date">Expire Date</label>
                            <input type="date" name="expire_date" class="form-control" id="expire_date" placeholder="Enter expire date">
                        </div>

                        <div class="form-group">
                            <label for="buying_price">Buying Price</label>
                            <input type="number" name="buying_price" class="form-control" id="buying_price" placeholder="Enter buying price">
                        </div>

                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <input type="number" name="selling_price" class="form-control" id="selling_price" placeholder="Enter selling price">
                        </div>

                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="product_img">Image</label>
                            <input type="file" name="product_img" class="form-control upload" id="product_img" accept="image/*" onchange="readURL(this);">
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