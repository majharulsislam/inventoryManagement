<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Customer;
use Image;
use File;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->get();
        return view('backend.customer.index', compact('customers'));
    }

    public function create()
    {
        return view('backend.customer.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers|max:55',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname;
        $customer->accountholder = $request->accountholder;
        $customer->accountnumber = $request->accountnumber;
        $customer->bankname = $request->bankname;
        $customer->bankbranch = $request->bankbranch;
        $customer->city = $request->city;

        // image check
        if($request->hasFile('photo')){
            $images = $request->file('photo');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/customer/'.$img);
            Image::make($images)->resize(250, 125)->save($destination);

            $customer->photo = $img;
        }

        $customer->save();

        $notify = array('messege' => 'Added new customer successfully!', 'alert-type' => 'success');
        return back()->with($notify);
    }
   
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('backend.customer.edit', compact('customer'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:customers|max:55',
            'phone' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::find($id);

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->shopname = $request->shopname;
        $customer->accountholder = $request->accountholder;
        $customer->accountnumber = $request->accountnumber;
        $customer->bankname = $request->bankname;
        $customer->bankbranch = $request->bankbranch;
        $customer->city = $request->city;

        // image check
        if($request->hasFile('photo')){

            if(File::exists('uploads/customer/'.$customer->photo)){
                File::delete('uploads/customer/'.$customer->photo);
            }
            
            $images = $request->file('photo');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/customer/'.$img);
            Image::make($images)->resize(250, 228)->save($destination);

            $customer->photo = $img;
        }

        $customer->save();

        $notify = array('messege' => 'Updated customer successfully!', 'alert-type' => 'success');
        return redirect()->route('all.customer')->with($notify);
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if(!is_null($customer)){
            if(File::exists('uploads/customer/'.$customer->photo)){
                File::delete('uploads/customer/'.$customer->photo);
            }

            $customer->delete();
        }

        $notify = array('messege' => 'Customer Deleted successfully!', 'alert-type' => 'success');
        return redirect()->route('all.customer')->with($notify);
    }
}
