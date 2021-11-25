@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>department</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/department')}}">Department</a></li>
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
                                <h3 class="card-title">Edit Department</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('department.update',$department->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$department->id}}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="departmentname">Name</label>
                                        <input value="{{$department->departmentname}}" type="text" class="form-control"
                                               id="departmentname" name="departmentname"
                                               placeholder="Enter Department Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="departmentnumber">department Number</label>
                                        <input value="{{$department->departmentnumber}}" type="text"
                                               class="form-control"
                                               id="departmentnumber" name="departmentnumber"
                                               placeholder="Enter department Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="departmentdescription" name="departmentdescription"
                                                  class="form-control"
                                                  rows="3"
                                                  placeholder="Enter department Description">{{$department->departmentdescription}}</textarea>
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
