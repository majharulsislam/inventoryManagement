<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Supplier;

use File;
use Image;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $suppliers = Supplier::orderBy('id', 'desc')->get();
        return view('backend.supplier.index', compact('suppliers'));
    }

    public function create()
    {
        return view('backend.supplier.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
        ]);

        $supplier = new Supplier();

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->shop = $request->shop;
        $supplier->type = $request->type;
        $supplier->accountholder = $request->accountholder;
        $supplier->accountnumber = $request->accountnumber;
        $supplier->bankname = $request->bankname;
        $supplier->bankbranch = $request->bankbranch;
        $supplier->city = $request->city;

        // image check
        if($request->hasFile('photo')){
            $images = $request->file('photo');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/supplier/'.$img);
            Image::make($images)->resize(250, 125)->save($destination);

            $supplier->photo = $img;
        }

        $supplier->save();

        $notify = array('messege' => 'Added new supplier successfully!', 'alert-type' => 'success');
        return redirect()->route('all.supplier')->with($notify);
    }
   
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('backend.supplier.edit', compact('supplier'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'type' => 'required',
        ]);

        $supplier = Supplier::find($id);

        $supplier->name = $request->name;
        $supplier->email = $request->email;
        $supplier->phone = $request->phone;
        $supplier->address = $request->address;
        $supplier->shop = $request->shop;
        $supplier->type = $request->type;
        $supplier->accountholder = $request->accountholder;
        $supplier->accountnumber = $request->accountnumber;
        $supplier->bankname = $request->bankname;
        $supplier->bankbranch = $request->bankbranch;
        $supplier->city = $request->city;

        // image check
        if($request->hasFile('photo')){

            if(File::exists('uploads/supplier/'.$supplier->photo)){
                File::delete('uploads/supplier/'.$supplier->photo);
            }
            
            $images = $request->file('photo');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/supplier/'.$img);
            Image::make($images)->resize(250, 228)->save($destination);

            $supplier->photo = $img;
        }

        $supplier->save();

        $notify = array('messege' => 'Updated supplier successfully!', 'alert-type' => 'success');
        return redirect()->route('all.supplier')->with($notify);
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);

        if(!is_null($supplier)){
            if(File::exists('uploads/supplier/'.$supplier->photo)){
                File::delete('uploads/supplier/'.$supplier->photo);
            }

            $supplier->delete();
        }

        $notify = array('messege' => 'Supplier Deleted successfully!', 'alert-type' => 'success');
        return redirect()->route('all.supplier')->with($notify);
    }
}
