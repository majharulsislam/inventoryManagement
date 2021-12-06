@extends('backend.layouts.master')

@section('title', 'Edit Supplier')

@section('adminContent')
    <!-- Page-Title -->
    <div class="row">
     <div class="col-sm-12">
         <h4 class="pull-left page-title">EDIT SUPPLIER</h4>
         <ol class="breadcrumb pull-right">
             <li><a href="#">Inventory</a></li>
             <li><a href="#">Supplier</a></li>
             <li class="active">Edit Supplier</li>
         </ol>
     </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading"><h3 class="panel-title">Edit Supplier Here</h3></div>
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
                    <form role="form" action="{{ route('update.supplier',$supplier->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{ $supplier->name }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{ $supplier->email }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" id="phone" value="{{ $supplier->phone }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" id="address" value="{{ $supplier->address }}">
                        </div>

                        <div class="form-group">
                            <label for="shop">Shop Name</label>
                            <input type="text" name="shop" class="form-control" id="shop" value="{{ $supplier->shop }}">
                        </div>

                        <div class="form-group">
                            <label for="type">type</label>
                            <select name="type" class="form-control" id="type">
                                <option value="">— Select —</option>
                                <option value="distributor" {{ $supplier->type== 'distributor' ? 'selected' : '' }}>Distributor</option>
                                <option value="wholeseller" {{ $supplier->type== 'wholeseller' ? 'selected' : '' }}>Whole Seller</option>
                                <option value="broker" {{ $supplier->type== 'broker' ? 'selected' : '' }}>broker</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="accountholder">Account Holder</label>
                            <input type="text" name="accountholder" class="form-control" id="accountholder" value="{{ $supplier->accountholder }}">
                        </div>

                        <div class="form-group">
                            <label for="accountnumber">Account Number</label>
                            <input type="text" name="accountnumber" class="form-control" id="accountnumber" value="{{ $supplier->accountnumber }}">
                        </div>

                        <div class="form-group">
                            <label for="bankname">Banak Name</label>
                            <input type="text" name="bankname" class="form-control" id="bankname" value="{{ $supplier->bankname }}">
                        </div>

                        <div class="form-group">
                            <label for="bankbranch">Bank Branch</label>
                            <input type="text" name="bankbranch" class="form-control" id="bankbranch" value="{{ $supplier->bankbranch }}">
                        </div>

                        <div class="form-group">
                            <label for="city">City</label>
                            <input type="text" name="city" class="form-control" id="city" value="{{ $supplier->city }}">
                        </div>

                        <div class="form-group">
                            <label>Old Photo</label>
                            @if(!is_null($supplier->photo))
                                <img src="{{ asset('uploads/supplier/'.$supplier->photo) }}" style="width:60px;height:auto;">
                            @else
                                <img src="{{ asset('uploads/supplier/default.jpg') }}" style="width:60px;height:auto;">
                            @endif
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