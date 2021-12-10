@extends("admin.layouts.master")
@section("content")

    <!--suppress SpellCheckingInspection -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Room</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/room')}}">Room</a></li>
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
                                <h3 class="card-title">Add Room</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('room.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="roomno">Room no</label>
                                        <input type="text" class="form-control" id="roomno" name="roomno" placeholder="Enter Room Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="floor_id">Floor</label>
                                        <select  class="form-control" id="floor_id" name="floor_id">
                                            @foreach($floor as $items)
                                            <option value="{{$items->id}}">{{$items->floorname}}</option>
                                            @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="price">Price of Room</label>
                                        <input type="number" min="0" class="form-control" id="price" name="price" placeholder="Enter Room Price">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="roomdescription" name="roomdescription"
                                                  class="form-control" rows="3"
                                                  placeholder="Enter Room Description"></textarea>
                                    </div>

                                    <div class="form-group">
                                        <label for="roomtype_id">Room Type</label>
                                        <select  class="form-control" id="roomtype_id" name="roomtype_id">
                                            @foreach($roomtype as $items)
                                            <option value="{{$items->id}}">{{$items->roomtypename}}</option>
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
