@extends("admin.layouts.master")
@section("content")

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
                                <h3 class="card-title">Edit Employee</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('updateemployee/'.$employee->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$employee->id}}" name="id">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="firstname">First name</label>
                                        <input value={{$employee->firstname}} type="text" class="form-control"
                                               id="firstname" name="firstname" placeholder="Enter Employee Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="lastname">Lastname</label>
                                        <input value={{$employee->lastname}} type="text" class="form-control"
                                               id="lastname" name="lastname" placeholder="Enter Employee Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">email</label>
                                        <input value={{$employee->email}} type="text" class="form-control"
                                               id="email" name="email" placeholder="Enter Employee email">
                                    </div>

                                    <div class="form-group">
                                        <label for="password">password</label>
                                        <input value={{$employee->password}} type="password" class="form-control"
                                               id="password" name="password" placeholder="Enter Employee password">
                                    </div>

                                    <div class="form-group">
                                        <label for="dob">dob</label>
                                        <input value={{$employee->lastname}} type="text" class="form-control"
                                               id="dob" name="dob" placeholder="Enter Employee dob">
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">phone</label>
                                        <input value={{$employee->phone}} type="text" class="form-control"
                                               id="phone" name="phone" placeholder="Enter Employee phone">
                                    </div>

                                    <div class="form-group">
                                        <label for="department">department</label>;

                                        <select  class="form-control" id="department" name="department">

                                        @foreach($department as $items)

                                            @if($employee->department == $items->id)
                                                <option selected
                                                        value="{{$items->id}}">{{$items->departmentname}}</option>
                                            @else
                                                <option value="{{$items->id}}">{{$items->departmentname}}</option>
                                            @endif

                                        @endforeach

                                        </select>



                                    </div>

                                    <div class="form-group">
                                        <label for="role">role</label>
                                        <select  class="form-control" id="role" name="role">

                                        @foreach($role as $items)

                                            @if($employee->role == $items->id)
                                                <option selected
                                                        value="{{$items->id}}">
                                                        {{$items->rolename}}</option>
                                            @else
                                                <option value="{{$items->id}}">
                                                {{$items->rolename}}</option>
                                            @endif

                                        @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="designation">designation</label>
                                        <input value={{$employee->designation}} type="text" class="form-control"
                                               id="designation" name="designation" placeholder="Enter Employee designation">
                                    </div>

                                    <div class="form-group">
                                        <label for="address">address</label>
                                        <input value={{$employee->address}} type="text" class="form-control"
                                               id="address" name="address" placeholder="Enter Employee address">
                                    </div>

                                    <div class="form-group">
                                        <label for="citizenship">citizenship</label>
                                        <input value={{$employee->citizenship}} type="text" class="form-control"
                                               id="citizenship" name="citizenship" placeholder="Enter Employee citizenship">
                                    </div>

                                    <div class="form-group">
                                        <label for="pannumber">pannumber</label>
                                        <input value={{$employee->pannumber}} type="text" class="form-control"
                                               id="pannumber" name="pannumber" placeholder="Enter Employee pannumber">
                                    </div>

                                    <div class="form-group">
                                        <label for="dateofjoining">dateofjoining</label>
                                        <input value={{$employee->dateofjoining}} type="text" class="form-control"
                                               id="dateofjoining" name="dateofjoining" placeholder="Enter Employee dateofjoining">
                                    </div>

                                    <div class="form-group">
                                        <label for="salary">salary</label>
                                        <input value={{$employee->salary}} type="text" class="form-control"
                                               id="salary" name="salary" placeholder="Enter Employee salary">
                                    </div>

                                    <div class="form-group">
                                        <label for="shift">shift</label>
                                        <select  class="form-control" id="shift" name="shift">

                                        @foreach($shift as $items)

                                            @if($employee->shift == $items->id)
                                                <option selected
                                                        value="{{$items->id}}">
                                                        {{$items->shiftname}}</option>
                                            @else
                                                <option value="{{$items->id}}">
                                                {{$items->shiftname}}</option>
                                            @endif

                                        @endforeach

                                        </select>
                                    </div>



                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="employeeimage">Image</label>
                                        <img src="{{asset('uploads/employee/'.$employee->employeeimage)}}"
                                             alt="Employee Icon"
                                             height="70px" width="70px">
                                        <input type="file" class="form-control" id="employeeimage" name="employeeimage">
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
