@extends('backend.layouts.master')

@section('title', 'View Order')

@section('adminContent')

<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12 bg-info">
        <h4 class="pull-left page-title text-white">Orders</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#" class="text-white">Inventory</a></li>
            <li class="text-white">View Order</li>
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
                            <strong>{{ $orderview->id }}</strong>
                        </h4>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-12">
                        
                        <div class="pull-left m-t-30">
                            <address>
                              <strong>Name: {{ $orderview->customer->name }}</strong><br>
                              Email:  {{ $orderview->customer->email }} <br>
                              Shopname: {{ $orderview->customer->shopname }}<br>
                              Address: {{ $orderview->customer->address }}<br>
                              City: {{ $orderview->customer->city }}<br>
                              <abbr title="Phone">Phone: {{ $orderview->customer->phone }}</abbr><br>
                            </address>
                        </div>
                        <div class="pull-right m-t-30">
                            <p><strong>Order Date: </strong>{{ $orderview->order_date }}</p>
                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">{{ $orderview->order_status }}</span></p>
                            <p class="m-t-10"><strong>Order ID: </strong> {{ $orderview->id }}</p>
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
                @if($orderview->order_status != 'success')
                    <div class="hidden-print">
                        <div class="pull-right orderbtn">
                            <a href="#" class="btn btn-inverse waves-effect waves-light" onclick="window.print()"><i class="fa fa-print"></i></a>
                            <form action="{{ route('order.update', $orderview->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Done</button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>


@endsection