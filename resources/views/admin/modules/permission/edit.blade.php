@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Permission</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/permission')}}">Permission</a></li>
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
                                <h3 class="card-title">Edit Permission</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{url('updatepermission/'.$permission->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$permission->id}}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="permissionname">Name</label>
                                        <input value="{{$permission->permissionname}}" type="text" class="form-control"
                                               id="permissionname" name="permissionname" placeholder="Enter Permission Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="permissionnumber">permission Number</label>
                                        <input value="{{$permission->permissionnumber}}" type="text" class="form-control"
                                               id="permissionnumber" name="permissionnumber" placeholder="Enter Permission Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="permissiondescription" name="permissiondescription" class="form-control"
                                                  rows="3"
                                                  placeholder="Enter permission Description">{{$permission->permissiondescription}}</textarea>
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
