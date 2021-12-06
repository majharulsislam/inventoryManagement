<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Advancesalary;
use App\Models\Employee;

class AdvancesalaryController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $advancesalaries = Advancesalary::orderBy('id', 'desc')->get();
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('backend.advancesalary.index', compact('advancesalaries', 'employees'));
    }

    public function create()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('backend.advancesalary.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_id' => 'required',
            'advancesalary' => 'required',
            'month' => 'required',
            'year' => 'required',
        ]);

        $advancepay = Advancesalary::where('emp_id', $request->emp_id)
                                    ->where('month', $request->month)
                                    ->first();

        if($advancepay === NULL){
            $advancesalary = new Advancesalary();
            $advancesalary->emp_id = $request->emp_id;
            $advancesalary->advancesalary = $request->advancesalary;
            $advancesalary->month = $request->month;
            $advancesalary->year = $request->year;
            $advancesalary->save();

            $notify = array('messege' => 'Advance Salary Paid!!', 'alert-type' => 'success');
            return redirect()->route('all.advancesalary')->with($notify);
        }
        else{
            $notify = array('messege' => 'Oops! Advance Salary Already Paid.', 'alert-type' => 'error');
            return back()->with($notify);
        }     

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'emp_id' => 'required',
            'advancesalary' => 'required',
            'year' => 'required',
        ]);

        $advancepay = Advancesalary::where('emp_id', $request->emp_id)
                                    ->where('month', $request->month)
                                    ->first();

        if($advancepay === NULL){
            $advancesalary = Advancesalary::find($id);
            $advancesalary->emp_id = $request->emp_id;
            $advancesalary->advancesalary = $request->advancesalary;
            $advancesalary->year = $request->year;
            $advancesalary->save();

            $notify = array('messege' => 'Advance Salary Updates Successfully!!', 'alert-type' => 'success');
            return redirect()->route('all.advancesalary')->with($notify);
        }
        else{
            $notify = array('messege' => 'Oops! Advance Salary Already Paid.', 'alert-type' => 'error');
            return back()->with($notify);
        }
    }

    public function destroy($id)
    {
        $advancesalary = Advancesalary::find($id);

        if(!is_null($advancesalary)){
            $advancesalary->delete();
        }

        $notify = array('messege' => 'Advance Salary Deleted Successfully!!', 'alert-type' => 'success');
        return redirect()->route('all.advancesalary')->with($notify);
    }
}
