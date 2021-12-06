<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Expence;
use App\Models\Order;

class PagesCotroller extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Dashboard
    public function index()
    {
        $month = date('m');
        $orderProduct = Order::whereMonth('updated_at', date('m'))
                    ->whereYear('updated_at', date('Y'))->sum('total_product');

        $orderTotal_amount = Order::whereMonth('updated_at', date('m'))
                    ->whereYear('updated_at', date('Y'))->sum('total');

        $totalEmp = Employee::orderBy('id', 'desc')->count();

        $totalExpence = Expence::orderBy('id', 'desc')->Where('month', $month)->sum('amount');

        return view('backend.index', compact('orderProduct', 'orderTotal_amount', 'totalExpence', 'totalEmp',));
    }


}
