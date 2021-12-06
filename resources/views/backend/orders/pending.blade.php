@extends('backend.layouts.master')

@section('title', 'Pending Orders')

@section('adminContent')
<!-- Page-Title -->
<!-- Page-Title -->
<div class="row">
    <div class="col-sm-12 bg-info">
        <h4 class="pull-left page-title text-white">Orders</h4>
        <ol class="breadcrumb pull-right">
            <li><a href="#" class="text-white">Inventory</a></li>
            <li class="text-white">Pending Orders</li>
        </ol>
    </div>
</div>
<br><br>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">All Pending Order Here.....</h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Customer Name</th>
                                 <th>Order Date</th>
                                 <th>Order Status</th>
                                 <th>Total Product</th>
                                 <th>Total Amount</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($orders as $key => $order)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $order->customer->name }}</td>
                                <td>{{ $order->order_date }}</td>
                                <td>{{ $order->order_status }}</td>
                                <td>{{ $order->total_product }}</td>
                                <td>{{ $order->total }}</td>
                                <td>
                                 	<a href="{{ route('order.view', $order->id) }}" class="btn btn-sm btn-info">view</a>
                                </td>
                             </tr>
                           @endforeach
                         </tbody>
                     </table>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div> <!-- End Row -->

@endsection