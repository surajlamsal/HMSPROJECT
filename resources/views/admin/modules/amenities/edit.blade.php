@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Amenities</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/amenities')}}">Amenities</a></li>
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
                                <h3 class="card-title">Edit Amenities</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('amenities.update',$amenities->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$amenities->id}}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="amenitiesname">Name</label>
                                        <input value={{$amenities->amenitiesname}} type="text" class="form-control"
                                               id="amenitiesname" name="amenitiesname"
                                               placeholder="Enter Amenities Name">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="amenitiesdescription" name="amenitiesdescription"
                                                  class="form-control" rows="3"
                                                  placeholder="Enter Amenities Description">{{$amenities->amenitiesdescription}}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="amenitiesicon">Amenities Icon</label>
                                        <input type="file" class="form-control" id="amenitiesicon"
                                               name="amenitiesicon" placeholder="Enter Amenities Number">
                                        <img src="{{asset('uploads/amenities/'.$amenities->amenitiesicon)}}"
                                             alt="Amenities Icon"
                                             height="70px" width="70px">
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
