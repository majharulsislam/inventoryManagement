@extends('backend.layouts.master')

@section('title', 'Advance Salary Record')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">ADVANCE SALARY</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Salary</a></li>
         <li class="active">Advance Salary</li>
     </ol>
 </div>
</div>

<div class="row">
 <div class="col-md-12">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">Eployee's Advance Salary Record Here</h3>
         </div>
         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <!-- Error -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <i class=" md-clear"></i>
                            </button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                     <table id="datatable" class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Employee Name</th>
                                 <th>Photo</th>
                                 <th>Salary</th>
                                 <th>Month</th>
                                 <th>Advance Amount</th>
                                 <th>Year</th>
                                 <th>Action</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($advancesalaries as $key => $advancesalary)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $advancesalary->employee->name }}</td>
                                <td>
                                    <img src="{{ asset('uploads/employee/'.$advancesalary->employee->photo) }}" style="width:80px;height:auto;">
                                </td>
                                <td>{{ $advancesalary->employee->salary }}</td>
                                <td>{{ $advancesalary->month }}</td>
                                <td>{{ $advancesalary->advancesalary }}</td>
                                <td>{{ $advancesalary->year }}</td>
                                <td>
                                 	<a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#advancesalary-{{ $advancesalary->id }}">Edit</a>

                                 	<a href="{{ route('destroy.advancesalary', $advancesalary->id) }}" id="delete" class="btn btn-sm btn-danger">Delete</a>
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


<!--========== Single Advance Salary Edit modal ==========-->
@foreach($advancesalaries as $advancesalary)
    <div class="modal fade" id="advancesalary-{{ $advancesalary->id }}" tabindex="-1" aria-labelledby="editLabel-{{ $advancesalary->id }}" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header" style="display:flex;justify-content:space-between;">
            <h5 class="modal-title" id="editLabel-{{ $advancesalary->id }}">
                {{ $advancesalary->employee->name }}'s Details</h5>
            <button type="button" class="pull-right" data-dismiss="modal"><i class=" md-clear"></i></button>
          </div>
          <div class="modal-body">
            <form role="form" action="{{ route('update.advancesalary',$advancesalary->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="emp_id">Employee Name</label>
                    <select name="emp_id" id="emp_id" class="form-control">
                        <option value="">— Select —</option>
                        @foreach($employees as $employee)
                            <option value="{{ $employee->id }}"  {{ $advancesalary->emp_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="advancesalary">Advance Amount</label>
                    <input type="number" name="advancesalary" id="advancesalary" class="form-control" value="{{ $advancesalary->advancesalary }}">
                </div>

                <div class="form-group">
                    <label for="month">Month</label>
                    <select name="month" id="month" class="form-control" disabled>
                        <option value="">— Select —</option>
                        <option value="January" {{ $advancesalary->month == 'January' ? 'selected' : '' }}>January
                        </option>

                        <option value="February" {{ $advancesalary->month == 'February' ? 'selected' : '' }}>February
                        </option>

                        <option value="March" {{ $advancesalary->month == 'March' ? 'selected' : '' }}>March
                        </option>

                        <option value="April" {{ $advancesalary->month == 'April' ? 'selected' : '' }}>April
                        </option>
                        <option value="May" {{ $advancesalary->month == 'January' ? 'selected' : '' }}>May
                        </option>

                        <option value="Jun" {{ $advancesalary->month == 'Jun' ? 'selected' : '' }}>Jun
                        </option>

                        <option value="July" {{ $advancesalary->month == 'July' ? 'selected' : '' }}>July
                        </option>

                        <option value="August" {{ $advancesalary->month == 'August' ? 'selected' : '' }}>August
                        </option>

                        <option value="September" {{ $advancesalary->month == 'September' ? 'selected' : '' }}>September
                        </option>

                        <option value="October" {{ $advancesalary->month == 'October' ? 'selected' : '' }}>October
                        </option>

                        <option value="November" {{ $advancesalary->month == 'November' ? 'selected' : '' }}>November
                        </option>

                        <option value="December" {{ $advancesalary->month == 'December' ? 'selected' : '' }}>December
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="year">Year</label>
                    <input type="number" name="year" id="year" class="form-control" value="{{ $advancesalary->year }}">
                </div>

                <button type="submit" class="btn btn-purple waves-effect waves-light pull-right">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
@endforeach

@endsection