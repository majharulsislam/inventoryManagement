<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{ asset('backend/images/users/avatar-1.jpg') }}" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">{{ Auth::user()->name }}<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                              document.getElementById('logout-form').submit();">
                                 {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                 @csrf
                            </form>
                        </li>
                    </ul>
                </div>
                
                <p class="text-muted m-0">Administrator</p>
            </div>
        </div>
        <!--- Divider -->
           <div id="sidebar-menu">
               <ul>
                  <li>
                     <a href="{{ route('admin.dashboard') }}" class="waves-effect {{ Route::is('admin.dashboard') ? 'active' : '' }}"><i class="md md-home"></i><span> Dashboard </span></a>
                  </li>

                    <li>
                     <a href="{{ route('pos') }}" class="waves-effect {{ Route::is('pos') ? 'active' : '' }}"><i class="md md-domain"></i><span> POS </span></a>
                    </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/employee*') ? 'active' : '' }}"><i class="md-account-child"></i><span> Employees </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('all.employee') }}">All  Employee</a></li>
                        <li><a href="{{ route('add.employee') }}">Add Employee</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/customer*') ? 'active' : '' }}"><i class="md-android"></i><span> Customers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('all.customer') }}">All  Customer</a></li>
                        <li><a href="{{ route('add.customer') }}">Add Customer</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/supplier*') ? 'active' : '' }}"><i class="md-directions-walk"></i><span> Suppliers </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('all.supplier') }}">All  Supplier</a></li>
                        <li><a href="{{ route('add.supplier') }}">Add Supplier</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/salary*') ? 'active' : '' }}"><i class="md-attach-money"></i><span> Salary (EMP) </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="#">Salary Record</a></li>
                        <li><a href="#">Pay Salary</a></li>
                        <li><a href="{{ route('all.advancesalary') }}">Advance Salary Record</a></li>
                        <li><a href="{{ route('create.advancesalary') }}">Pay Advance Salary</a></li>
                    </ul>
                  </li>

                  <li>
                     <a href="{{ route('all.category') }}" class="waves-effect {{ Route::is('all.category') ? 'active' : '' }}"><i class="md-healing"></i><span> Category </span></a>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/product*') ? 'active' : '' }}"><i class="md-local-grocery-store"></i><span> Products </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('all.product') }}">Products Record</a></li>
                        <li><a href="{{ route('add.product') }}">Add New Product</a></li>
                    </ul>
                  </li>

                   <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/orders*') ? 'active' : '' }}"><i class="md-local-cafe"></i><span> Orders </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('orders.pending') }}">Pending Order</a></li>
                        <li><a href="{{ route('orders.success') }}">Success Order</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/expences*') ? 'active' : '' }}"><i class="md-system-update-tv"></i><span> Expences </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('add.expences') }}">Add New Ecpences</a></li>
                        <li><a href="{{ route('all.expences') }}">All Expences List</a></li>
                        <li><a href="{{ route('today.expences') }}">Today Expences</a></li>
                        <li><a href="{{ route('month.expences') }}">This Month Expences</a></li>
                        <li><a href="{{ route('year.expences') }}">This Year Expences</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/sales*') ? 'active' : '' }}"><i class="md-report"></i><span> Sales Report </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="#">First</a></li>
                        <li><a href="#">Second</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/attendence*') ? 'active' : '' }}"><i class="md-local-bar"></i><span> Attendence </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                     <li><a href="{{ route('take.attendence') }}">Take Attendence</a></li>
                     <li><a href="{{ route('all.attendence') }}">Attendence Report</a></li>
                    </ul>
                  </li>

                  <li class="has_sub">
                    <a href="" class="waves-effect {{ Request::is('admin/settings*') ? 'active' : '' }}"><i class="md-settings"></i><span> Settings </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="#">Setting</a></li>
                    </ul>
                  </li>
               </ul>
               <div class="clearfix"></div>
           </div>
        <div class="clearfix"></div>
    </div>
</div>