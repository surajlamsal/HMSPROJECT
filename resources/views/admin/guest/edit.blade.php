@extends("admin.layouts.master")
@section("content")

    <!--suppress SpellCheckingInspection -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Hall Type</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/guest')}}">Guests</a></li>
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
                                <h3 class="card-title">Edit Guest</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('guest.update',$guest->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$guest->id}}" name="id">

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="">Guest name:</label>
                                        <input type="text" name="guestname" class="form-control"
                                               placeholder="Enter Guest name" value="{{$guest->guestname}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Address:</label> <br/>
                                        <input type="text" name="address" class="form-control"
                                               placeholder="Enter your Address" value="{{$guest->address}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Email:</label>
                                        <input type="email" name="email" class="form-control"
                                               placeholder="Enter your email" value="{{$guest->email}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Phone:</label>
                                        <input type="number" name="phone" class="form-control"
                                               placeholder="Enter phone number" value="{{$guest->phone}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Citizenship Id:</label>
                                        <input type="tel" class="form-control" name="citizenship"
                                               placeholder="Enter citizenship" value="{{$guest->citizenship}}">
                                    </div>

                                    <div class="form-group">
                                        <label for="">Organizaion:</label>
                                        <input type="text" class="form-control" name="organization"
                                               placeholder="Enter organization">
                                    </div>


                                    <div class="form-group">
                                        <label for="">Arrived from:</label>
                                        <input type="text" class="form-control" name="arrival">
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
