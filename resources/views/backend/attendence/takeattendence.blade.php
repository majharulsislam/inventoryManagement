@extends('backend.layouts.master')

@section('title', 'Take Attendence')

@section('adminContent')
<!-- Page-Title -->
<div class="row">
 <div class="col-sm-12">
     <h4 class="pull-left page-title">TAKE ATTENDENCE</h4>
     <ol class="breadcrumb pull-right">
         <li><a href="#">Inventory</a></li>
         <li><a href="#">Attendence</a></li>
         <li class="active">Take Attendence</li>
     </ol>
 </div>
</div>

<div class="row">
<div class="col-md-1"></div>
 <div class="col-md-9">
     <div class="panel panel-default">
         <div class="panel-heading">
             <h3 class="panel-title">Employee Attendence Take Here. <span class="pull-right text-success">Date: {{ date('d-m-Y') }}</span></h3>
         </div>

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

         <div class="panel-body">
             <div class="row">
                 <div class="col-md-12 col-sm-12 col-xs-12 table-responsive">
                    <form action="{{ route('store.attendence') }}" method="POST">
                        @csrf
                     <table class="table table-striped table-bordered">
                         <thead>
                             <tr>
                                 <th>#SL</th>
                                 <th>Name</th>
                                 <th>Image</th>
                                 <th>Attendence</th>
                             </tr>
                         </thead>
                         <tbody>
                         	@foreach($employees as $key => $employee)
                             <tr>
                                <td>{{ $key+1 }}</td>
                                <td>{{ $employee->name }}</td>
                                <input type="hidden" name="user_id[]" value="{{ $employee->id }}">
                                <td>
                                 	<img src="{{ asset('uploads/employee/'.$employee->photo) }}" alt="employee-image" style="width:60px;height:auto;">
                                </td>
                                <input type="hidden" name="attend_date" value="{{ date('d-m-Y') }}">
                                <input type="hidden" name="attend_year" value="{{ date('Y') }}">
                                <td>
                                 	<input type="radio" name="attendence[{{ $employee->id }}]" id="present{{ $employee->id }}" value="Present" required>
                                    <label for="present{{ $employee->id }}">Present</label>

                                 	&nbsp;&nbsp;&nbsp;

                                    <input type="radio" name="attendence[{{ $employee->id }}]" id="absent{{ $employee->id }}" value="Absent" required>
                                    <label for="absent{{ $employee->id }}">Absent</label>
                                </td>
                             </tr>
                           @endforeach
                         </tbody>
                     </table>
                     <input type="submit" class="btn btn-sm btn-primary pull-right" value="Take Attendence">
                    </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
</div> <!-- End Row -->


@endsection