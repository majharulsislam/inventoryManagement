<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Expence;

class ExpencesController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $expenceses = Expence::orderBy('id', 'desc')->get();
        $expences_total = Expence::orderBy('id', 'desc')->sum('amount');
        return view('backend.expences.index', compact('expenceses', 'expences_total'));
    }

    
    public function create()
    {
        return view('backend.expences.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'details' => 'required',
            'amount' => 'required',
        ]);

        $expences = new Expence();
        $expences->details = $request->details;
        $expences->amount = $request->amount;
        $expences->date = $request->date;
        $expences->month = $request->month;
        $expences->year = $request->year;

        $expences->save();

        $notify = array('messege' => 'Expences Added Successfully!', 'alert-type' => 'success');
        return back()->with($notify);
    }


    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'details' => 'required',
            'amount' => 'required',
        ]);

        $expences = Expence::find($id);
        $expences->details = $request->details;
        $expences->amount = $request->amount;
        $expences->date = $request->date;
        $expences->month = $request->month;
        $expences->year = $request->year;

        $expences->save();

        $notify = array('messege' => 'Expences Updated Successfully!', 'alert-type' => 'success');
        return back()->with($notify);
    }

    public function destroy($id)
    {
        $expences = Expence::find($id);
        if(!is_null($expences)){
            $expences->delete();
        }

        $notify = array('messege' => 'Expences Deleted Successfully!', 'alert-type' => 'success');
        return back()->with($notify);
    }

    public function todayExpences()
    {
        $todaydate = date('d-m-Y');
        $expenceses = Expence::where('date', $todaydate)->get();
        $expences_total = Expence::where('date', $todaydate)->sum('amount');
        return view('backend.expences.todayexpence', compact('expenceses', 'expences_total'));
    }

    public function monthExpences()
    {
        $thismonth = date('m');
        $expenceses = Expence::where('month', $thismonth)->get();
        $expences_total = Expence::where('month', $thismonth)->sum('amount');
        return view('backend.expences.monthexpences', compact('expenceses', 'expences_total'));
    }

    public function yearExpences()
    {
        $thisyear = date('Y');
        $expenceses = Expence::where('year', $thisyear)->get();
        $expences_total = Expence::where('year', $thisyear)->sum('amount');
        return view('backend.expences.yearexpences', compact('expenceses', 'expences_total'));
    }
}
