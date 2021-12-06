<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
use File;
use Image;

class EmployeeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('backend.employee.index', compact('employees'));
    }

    public function create()
    {
        return view('backend.employee.create');
    }
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:employees|max:55',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'city' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png,gif',
        ]);

        $employee = new Employee();

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->nid = $request->nid;

        // image check
        if($request->hasFile('photo')){
            $images = $request->file('photo');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/employee/'.$img);
            Image::make($images)->resize(250, 125)->save($destination);
        }

        $employee->photo = $img;
        $employee->save();

        $notify = array('messege' => 'Added new employee successfully!', 'alert-type' => 'success');
        return redirect()->route('all.employee')->with($notify);
    }
   
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('backend.employee.edit', compact('employee'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'experience' => 'required',
            'salary' => 'required',
            'city' => 'required',
        ]);

        $employee = Employee::find($id);

        $employee->name = $request->name;
        $employee->email = $request->email;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->experience = $request->experience;
        $employee->salary = $request->salary;
        $employee->vacation = $request->vacation;
        $employee->city = $request->city;
        $employee->nid = $request->nid;

        // image check
        if($request->hasFile('photo')){

            if(File::exists('uploads/employee/'.$employee->photo)){
                File::delete('uploads/employee/'.$employee->photo);
            }

            $images = $request->file('photo');
            $img = time().'.'.$images->getClientOriginalExtension();
            $destination = public_path('uploads/employee/'.$img);
            Image::make($images)->resize(250, 228)->save($destination);

            $employee->photo = $img;
        }

        $employee->save();

        $notify = array('messege' => 'Employee updated successfully!', 'alert-type' => 'success');
        return redirect()->route('all.employee')->with($notify);
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);

        if(!is_null($employee)){
            if(File::exists('uploads/employee/'.$employee->photo)){
                File::delete('uploads/employee/'.$employee->photo);
            }

            $employee->delete();
        }

        $notify = array('messege' => 'Employee Deleted successfully!', 'alert-type' => 'success');
        return redirect()->route('all.employee')->with($notify);
    }
}
