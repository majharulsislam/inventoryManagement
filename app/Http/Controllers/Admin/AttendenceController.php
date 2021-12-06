<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Employee;
use App\Models\Attendence;

class AttendenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function Allattendence()
    {
        $attendences = Attendence::select('edit_date')->groupBy('edit_date')->get();
        return view('backend.attendence.allattendence', compact('attendences'));
    }

    public function takeattendence()
    {
        $employees = Employee::orderBy('id', 'desc')->get();
        return view('backend.attendence.takeattendence', compact('employees'));
    }

    public function store(Request $request)
    {

        $date = $request->attend_date;
        $exists_date = Attendence::where('attend_date', $date)->first();

        if($exists_date){
            $notify = array('messege' => 'Attendence Already Taken!', 'alert-type' => 'error');
            return back()->with($notify);
        }
        else{
            foreach($request->user_id as $id){
                $takeattend = new Attendence();
                $takeattend->user_id = $id;
                $takeattend->attendence = $request->attendence[$id];
                $takeattend->attend_date = $request->attend_date;
                $takeattend->attend_year = $request->attend_year;
                $takeattend->edit_date = date('d_m_Y');

                $takeattend->save();
            }

            $notify = array('messege' => 'Attendence Taken Successfully!', 'alert-type' => 'success');
            return back()->with($notify);
        }

    }



}
