<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Cart;

class CartController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    //product cart store
    public function store(Request $request)
    {
        $data = array();
        $data['id'] = $request->productId;
        $data['name'] = $request->product_name;
        $data['qty'] = $request->product_qty;
        $data['price'] = $request->product_price;

        $cart_products = Cart::add($data);

        $notify = array('messege' => 'Your product added to cart', 'alert-type' => 'success');
        return back()->with($notify);

    }

    // cart store or quantity update
    public function update(Request $request,$rowId)
    {
        // Onek gulo product update kore ai vbe
        //$data = array();
        //$data['name'] = $request->product_name;
        //$data['qty'] = $request->prod_qty;

        // Ekta product update korte
        $qty = $request->prod_qty;
        Cart::update($rowId, $qty);
       
        $notify = array('messege' => 'Quantity Updated Successfully!', 'alert-type' => 'success');
        return back()->with($notify);
        
    }

    public function destroy($rowId)
    {
        $delete = Cart::remove($rowId);

        $notify = array('messege' => 'Product remove from cart!', 'alert-type' => 'error');
        return back()->with($notify);
    }
}
