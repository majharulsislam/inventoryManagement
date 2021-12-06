@extends('backend.layouts.master')

@section('title', 'Invoice')

@section('adminContent')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12 bg-info">
        <h4 class="pull-left page-title text-white">POS</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#" class="text-white">Inventory</a></li>
            <li class="text-white">Invoice</li>
        </ol>
    </div>
</div>
<br><br>


<!-- Invoice content -->
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <!-- <div class="panel-heading">
                <h4>Invoice</h4>
            </div> -->
            <div class="panel-body">
                <div class="clearfix">
                    <div class="pull-left">
                        <h4 class="text-right">Inventory Management</h4>
                        
                    </div>
                    <div class="pull-right">
                        <h4>Invoice # <br>
                            <strong>cart id dite hobe</strong>
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="pull-left m-t-30">
                            <address>
                              <strong>Name: {{ $customer->name }}</strong><br>
                              Email:  {{ $customer->email }} <br>
                              Shopname: {{ $customer->shopname }}<br>
                              Address:  {{ $customer->address }} <br>
                              City:  {{ $customer->city }} <br>
                              <abbr title="Phone">Phone: {{ $customer->phone }}</abbr><br>
                            </address>
                        </div>
                        <div class="pull-right m-t-30">
                            <p><strong>Order Date: </strong>{{ date('d F Y') }}</p>
                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>
                            <p class="m-t-10"><strong>Order ID: </strong> 1</p>
                        </div>
                    </div>
                </div>
                <div class="m-h-50"></div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table m-t-30">
                                <thead>
                                    <tr><th>#</th>
                                    <th>Item</th>
                                    <th>Quantity</th>
                                    <th>Unit Cost</th>
                                    <th>Total</th>
                                </tr></thead>
                                <tbody>

                                	@php
                                		$sl = 1
                                	@endphp
                                	@foreach($cartContent as $cartproduct)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $cartproduct->name }}</td>
                                        <td>{{ $cartproduct->qty }}</td>
                                        <td>{{ $cartproduct->price }}</td>
                                        <td>{{ $cartproduct->price*$cartproduct->qty }}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row" style="border-radius: 0px;">
                    <div class="col-md-3 col-md-offset-9">
                        <p class="text-right"><b>Sub-total:</b> {{ Cart::subtotal(); }}</p>
                        <p class="text-right">Discout: 0.00</p>
                        <p class="text-right">VAT: {{ Cart::tax(); }}</p>
                        <hr>
                        <h3 class="text-right">USD {{ Cart::total(); }}</h3>
                    </div>
                </div>
                <hr>
                <div class="hidden-print">
                    <div class="pull-right">
                        <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print()"><i class="fa fa-print"></i></a>
                        <a href="#" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target="#con-close-modal">Submit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Add new customer modal form -->
<div id="con-close-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <form role="form" action="{{ route('order.store') }}" method="POST">
                @csrf
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">Invoice Of {{ $customer->name }} <span class="pull-right">USD {{ Cart::total(); }}</span></h4> 
                </div> 
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="paid" class="control-label">Payment</label>
                                <select name="payment" id="paid" class="form-control">
                                    <option value="">- Select Payment -</option>
                                    <option value="handcash">Handcash</option>
                                    <option value="cheque">Cheque</option>
                                    <option value="due">Due</option>
                                </select>
                            </div> 
                        </div>
                         <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="pay" class="control-label">Pay</label> 
                                <input type="number" name="pay" class="form-control" id="pay">
                            </div> 
                        </div>
                        <div class="col-md-4"> 
                            <div class="form-group"> 
                                <label for="due" class="control-label">Due</label> 
                                <input type="number" name="due" class="form-control" id="due"> 
                            </div> 
                        </div>
                    </div>
                </div>

                <input type="hidden" name="customer_id" value="{{ $customer->id }}">
                <input type="hidden" name="order_date" value="{{ date('d-m-Y') }}">
                <input type="hidden" name="order_status" value="pending">
                <input type="hidden" name="total_product" value="{{ Cart::count(); }}">
                <input type="hidden" name="subtotal" value="{{ Cart::subtotal(); }}">
                <input type="hidden" name="vat" value="{{ Cart::tax(); }}">
                <input type="hidden" name="total" value="{{ Cart::total(); }}">


                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Close</button> 
                    <button type="Submit" class="btn btn-info waves-effect waves-light">Submit</button> 
                </div>
            </form>
        </div> 
    </div>
</div><!-- /.modal -->


@endsection