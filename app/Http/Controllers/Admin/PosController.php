<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;
use Cart;
use DB;

class PosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('backend.pos.index', compact('products', 'customers'));
    }

    // create invoice
    public function createinvoice(Request $request)
    {
        $validated = $request->validate([
            'customerId' => 'required',
        ],
            [
                'customerId.required' => 'Select Customer Name First!'
            ]
        );

        $cartContent = Cart::content();
        $cusId = $request->customerId;
        $customer = Customer::orderBy('id', 'desc')->Where('id',$cusId)->first();

    
        return view('backend.pos.invoice', compact('cartContent', 'customer'));

    }

    // order store
    public function store (Request $request)
    {
        $orderData = array();
        $orderData['customer_id'] = $request->customer_id;
        $orderData['order_date'] = $request->order_date;
        $orderData['order_status'] = $request->order_status;
        $orderData['total_product'] = $request->total_product;
        $orderData['subtotal'] = $request->subtotal;
        $orderData['vat'] = $request->vat;
        $orderData['total'] = $request->total;
        $orderData['peyment_status'] = $request->payment;
        $orderData['pay'] = $request->pay;
        $orderData['due'] = $request->due;

        $orderId = DB::table('orders')->insertGetId($orderData);

       // insert order details table data
        $cart_products = Cart::content();
        $orderDetails = array();
        foreach($cart_products as $cart_product){
            $orderDetails['order_id'] = $orderId;
            $orderDetails['product_id'] = $cart_product->id;
            $orderDetails['quantity'] = $cart_product->qty;
            $orderDetails['unit_cost'] = $cart_product->price;
            $orderDetails['total'] = $cart_product->total;

            $insertData = DB::table('orderdetails')->insert($orderDetails);

        }

        $notify = array('messege' => 'Invoice successfully created and deliver product now!', 'alert-type' => 'success');
        return redirect()->route('pos')->with($notify);

    }


    // Pending order
    public function OrderPending()
    {
        $orders = Order::orderBy('id', 'desc')->Where('order_status', 'pending')->get();
        return view('backend.orders.pending', compact('orders'));
    }

    // Success order
    public function OrderSuccess()
    {
       $orders = Order::orderBy('id', 'desc')->Where('order_status', 'success')->get();
        return view('backend.orders.success', compact('orders'));
    }

    // Order view
    public function OrderView($id)
    {
        $orderview = Order::orderBy('id', 'desc')->Where('id', $id)->first();
        $cartContent = Cart::content();

       //echo '<pre>';
       //print_r($orderdetails);
        return view('backend.orders.view-order', compact('orderview', 'cartContent'));
    }

    // Order update
    public function OrderUpdate(Request $request, $id)
    {
        $orderup = Order::find($id);

        $orderup->order_status = 'success';
        $orderup->save();

         $cartclear = Cart::destroy();

        $notify = array('messege' => 'Your Order Successfully Done & Deliver Now!', 'alert-type' => 'success');
        return redirect()->route('orders.pending')->with($notify);

    }

}
