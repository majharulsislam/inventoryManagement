@extends('backend.layouts.master')

@section('title', 'Edit Product')

@section('adminContent')
	<!-- Page-Title -->
	<div class="row">
	 <div class="col-sm-12">
	     <h4 class="pull-left page-title">EDIT PRODUCT</h4>
	     <ol class="breadcrumb pull-right">
	         <li><a href="#">Inventory</a></li>
	         <li><a href="#">Products</a></li>
	         <li class="active">Edit Product</li>
	     </ol>
	 </div>
	</div>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Your Existing Product Edit Here</h3></div>
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
                    <form role="form" action="{{ route('update.product', $product->id) }}" method="POST" enctype="multipart/form-data">
                    	@csrf
                        <div class="form-group">
                            <label for="product_name">Product Name</label>
                            <input type="text" name="product_name" class="form-control" id="product_name" value="{{ $product->product_name }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" name="product_code" class="form-control" id="product_code" value="{{ $product->product_code }}">
                        </div>

                        <div class="form-group">
                            <label for="cate_id">Category</label>
                            <select name="cate_id" id="cate_id" class="form-control">
                            	<option value="">— Select —</option>
                            	@foreach($categories as $category)
                            		<option value="{{ $category->id }}" {{ $category->id == $product->cate_id ? 'selected' : '' }}>{{ $category->categoryname }}</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="supply_id">Supplier</label>
                            <select name="supply_id" id="supply_id" class="form-control">
                            	<option value="">— Select —</option>
                            	@foreach($suppliers as $supplier)
                            		<option value="{{ $supplier->id }}" {{ $supplier->id == $product->supply_id ? 'selected' : '' }}>{{ $supplier->name }}</option>
                            	@endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="product_self">Product Self</label>
                            <input type="text" name="product_self" class="form-control" id="product_self" value="{{ $product->product_self }}">
                        </div>

                        <div class="form-group">
                            <label for="product_route">Product Route</label>
                            <input type="text" name="product_route" class="form-control" id="product_route" value="{{ $product->product_route }}">
                        </div>

                        <div class="form-group">
                            <label for="buy_date">Buy Date</label>
                            <input type="date" name="buy_date" class="form-control" id="buy_date" value="{{ $product->buy_date }}">
                        </div>

                        <div class="form-group">
                            <label for="expire_date">Expire Date</label>
                            <input type="date" name="expire_date" class="form-control" id="expire_date" value="{{ $product->expire_date }}">
                        </div>

                        <div class="form-group">
                            <label for="buying_price">Buying Price</label>
                            <input type="number" name="buying_price" class="form-control" id="buying_price" value="{{ $product->buying_price }}">
                        </div>

                        <div class="form-group">
                            <label for="selling_price">Selling Price</label>
                            <input type="number" name="selling_price" class="form-control" id="selling_price" value="{{ $product->selling_price }}">
                        </div>

                        <div class="form-group">
                            <label>Old Image</label>
                            <img src="{{ asset('uploads/products/'.$product->product_img) }}" style="width:80px;height: auto;">
                        </div>

                        <div class="form-group">
                        	<img id="image" src="#">
                            <label for="product_img">Image</label>
                            <input type="file" name="product_img" class="form-control upload" id="product_img" accept="image/*" onchange="readURL(this);">
                        </div>
                        <button type="submit" class="btn btn-primary waves-effect waves-light pull-right">Update</button>
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