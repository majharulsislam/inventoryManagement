@extends('backend.layouts.master')

@section('title', 'POS')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12 bg-info">
     <h4 class="pull-left page-title text-white">
        POS (Point Of Sale)
    </h4>
    <ol class="breadcrumb pull-right">
        <li>
            <a class="text-white" href="#">
                Inventory
            </a>
        </li>
        <li class="text-white">
            POS
        </li>
    </ol>
</div>
</div>
<br>
<br>
<!-- POS -->
<div class="row">
    <div class="col-md-5">
        <h4 class="text-center">
            Carted Product
        </h4>
        <!--============ Invoice table =========-->
        <div class="price_card text-center">
            <ul class="price-features">
                <table class="table">
                    <thead>
                        <tr class="bg-primary">
                            <td> Name</td>
                            <td>Qty</td>
                            <td>Unit Price</td>
                            <td>Sub Total</td>
                            <td>Action</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $cart_products = Cart::content()
                        @endphp
                        @foreach ($cart_products as $cart_product)
                        <tr>
                            <td>
                                {{ $cart_product->name }}
                            </td>
                            <td>
                                <form action="{{ route('cart.update',$cart_product->rowId) }}" method="POST" style="display:flex;">
                                    @csrf
                                    <input name="prod_qty" style="width:40px" type="number" value="{{ $cart_product->qty }}">
                                    <button class="btn btn-sm btn-success" name="submit" style="margin-top:-2px;margin-left:3px;padding:0 5px" type="submit">
                                        <i class="md md-check">
                                        </i>
                                    </button>
                                </input>
                            </form>
                        </td>
                        <td>
                            {{ $cart_product->price }}
                        </td>
                        <td>
                            {{ $cart_product->qty*$cart_product->price }}
                        </td>
                        <td>
                            <a href="{{ route('cart.remove',$cart_product->rowId) }}">
                                <i class="md md-delete">
                                </i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </ul>
        <div class="bg-primary">
            <p style="padding-top:10px;">
                Quantity: {{ Cart::count(); }}
            </p>
            <p>
                Vat: {{ Cart::tax(); }}
            </p>
            <p>
                Subtotal without tax: {{ Cart::subtotal(); }}
            </p>
            <hr>
            <h3 class="text-white" style="padding-bottom:10px;">
                Total = {{ Cart::total(); }}
            </h3>
        </hr>
    </div>
    <form action="{{ route('create.invoice') }}" method="POST">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>
                    {{ $error }}
                </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="panel">
            <h4>
                Select Customer
                <a class="btn btn-sm btn-primary pull-right waves-effect waves-light" data-target="#con-close-modal" data-toggle="modal" href="#">
                    Add New
                </a>
            </h4>
            <select class="form-control" name="customerId">
                <option disabled="" selected="" value="">
                    - Select Customer -
                </option>
                @foreach ($customers as $customer)
                <option value="{{ $customer->id }}">
                    {{ $customer->name }}
                </option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary waves-effect waves-light w-md" type="submit">
            Create Invoice
        </button>
    </form>
</div>
<!-- end Pricing_card -->
</div>
<!-- all product table -->
<div class="col-md-7">
    <table class="table table-striped table-bordered" id="datatable">
        <thead>
            <tr>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Product Code</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="cart_btn">
                    <form action="{{ route('add.cart') }}" method="POST">
                        @csrf
                        <input name="productId" type="hidden" value="{{ $product->id }}">
                        <input name="product_name" type="hidden" value="{{ $product->product_name }}">
                        <input name="product_qty" type="hidden" value="1">
                        <input name="product_price" type="hidden" value="{{ $product->selling_price }}">
                        <button style="font-size:20px;color:#fff" type="submit">
                            <i class="md md-add bg-info">
                            </i>
                        </button>
                    </input>
                </input>
            </input>
        </input>
    </form>
    <img src="{{ asset('uploads/products/'.$product->product_img) }}" style="width:60px; height: auto;">
</img>
</td>
<td>
    {{ $product->product_name }}
</td>
<td>
    {{ $product->category->categoryname }}
</td>
<td>
    {{ $product->product_code }}
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
<!-- Add new customer modal form -->
<div aria-hidden="true" aria-labelledby="myModalLabel" class="modal fade" id="con-close-modal" role="dialog" style="display: none;" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('store.customer') }}" enctype="multipart/form-data" method="POST" role="form">
                @csrf
                <div class="modal-header">
                    <button aria-hidden="true" class="close" data-dismiss="modal" type="button">
                        ×
                    </button>
                    <h4 class="modal-title">
                        Add New Customer
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label" for="name">
                                    Name
                                </label>
                                <input class="form-control" id="name" name="name" placeholder="Enter customer name" required="" type="text">
                            </input>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label" for="email">
                                Email
                            </label>
                            <input class="form-control" id="email" name="email" placeholder="Enter customer email" type="email">
                        </input>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="control-label" for="phone">
                            Phone
                        </label>
                        <input class="form-control" id="phone" name="phone" placeholder="Enter customer phone" required="" type="number">
                    </input>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label" for="address">
                        Address
                    </label>
                    <input class="form-control" id="address" name="address" placeholder="Enter customer address" required="" type="text">
                </input>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label class="control-label" for="shopname">
                    Shop Name
                </label>
                <input class="form-control" id="shopname" name="shopname" placeholder="Enter shopname" required="" type="text">
            </input>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label" for="accountholder">
                Account Holder
            </label>
            <input class="form-control" id="accountholder" name="accountholder" placeholder="Enter account holder" required="" type="text">
        </input>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="control-label" for="accountnumber">
            Account Number
        </label>
        <input class="form-control" id="accountnumber" name="accountnumber" placeholder="Enter account number" required="" type="number">
    </input>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label class="control-label" for="bankname">
                Bank Name
            </label>
            <input class="form-control" id="bankname" name="bankname" placeholder="Enter bankname" required="" type="text">
        </input>
    </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="control-label" for="bankbranch">
            Branch Name
        </label>
        <input class="form-control" id="bankbranch" name="bankbranch" placeholder="Enter branch name" required="" type="text">
    </input>
</div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <label class="control-label" for="city">
            City
        </label>
        <input class="form-control" id="city" name="city" placeholder="Enter city" required="" type="text">
    </input>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <img id="image" src="#">
            <label for="photo">
                Image
            </label>
            <input accept="image/*" class="form-control upload" id="photo" name="photo" onchange="readURL(this);" type="file">
        </input>
    </img>
</div>
</div>
</div>
</div>
<div class="modal-footer">
    <button class="btn btn-default waves-effect" data-dismiss="modal" type="button">
        Close
    </button>
    <button class="btn btn-info waves-effect waves-light" type="Submit">
        Submit
    </button>
</div>
</form>
</div>
</div>
</div>
<!-- /.modal -->
<!-- This code for show input image when select any image -->
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
</br>
</br>