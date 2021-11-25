@extends("admin.layouts.master")
@section("content")

    <!--suppress SpellCheckingInspection -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Employee</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/employee')}}">Employee</a></li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Add Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('insertemployee')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="firstname">First name</label>
                                        <input type="text" class="form-control" id="firstname" name="firstname"
                                               placeholder="Enter Employee Firstname">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <input type="text" class="form-control" id="lastname" name="lastname"
                                               placeholder="Enter Employee Last Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email"
                                               placeholder="Enter Employee Email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                               placeholder="Enter Employee Password">
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">DOB</label>
                                        <input type="date" class="form-control" id="dob" name="dob"
                                               placeholder="2070-01-01">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               placeholder="Enter Employee Phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="designation">Designation</label>
                                        <input type="text" class="form-control" id="designation" name="designation"
                                               placeholder="Enter Employee Designation">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               placeholder="Enter Employee Address">
                                    </div>

                                    <div class="form-group">
                                        <label for="citizenship">Citizenship No.</label>
                                        <input type="text" class="form-control" id="citizenship" name="citizenship"
                                               placeholder="Enter Employee Citizenship Number">
                                    </div>

                                    <div class="form-group">
                                        <label for="pannumber">Pan Number</label>
                                        <input type="text" class="form-control" id="pannumber" name="pannumber"
                                               placeholder="Enter Employee Pan Number">
                                    </div>

                                    <div class="form-group">
                                        <label for="dateofjoining">Date of joining</label>
                                        <input type="date" class="form-control" id="dateofjoining" name="dateofjoining"
                                               placeholder="2078-01-01">
                                    </div>

                                    <div class="form-group">
                                        <label for="salary">Salary</label>
                                        <input type="text" class="form-control" id="salary" name="salary"
                                               placeholder="Enter Employee Salary">
                                    </div>


                                    <div class="form-group">
                                        <label for="employeeimage">Image</label>
                                        <input type="file" class="form-control" id="employeeimage" name="employeeimage">
                                    </div>


                                    <div class="form-group">
                                        <label for="shift">Select Shift</label>
                                        <select class="form-control" id="shift" name="shift">
                                            @foreach($shift as $items)
                                                <option value="{{$items->id}}">{{$items->shiftname}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="department">Select Department</label>
                                        <select class="form-control" id="department" name="department">
                                            @foreach($department as $items)
                                                <option value="{{$items->id}}">{{$items->departmentname}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="role">Select Role</label>
                                        <select class="form-control" id="role" name="role">
                                            @foreach($role as $items)
                                                <option value="{{$items->id}}">{{$items->rolename}}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->


                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->

                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>


@endsection
