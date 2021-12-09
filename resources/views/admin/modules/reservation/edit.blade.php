@extends("admin.layouts.master")
@section("content")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Floor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/reservation')}}">Reservation</a></li>
                        </ol>
                    </div>
                </div>
            </div>
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
                                <h3 class="card-title">Edit Reservation</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('reservation.update',$reservation->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')


                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="guest_id">Select Guest</label>
                                        {{--for loop lagouni--}}
                                        <select class="form-control" id="guest_id" name="guest_id">
                                            @foreach($guest as $items)
                                                <option {{($items->id == $reservation->guest_id)?("selected"):("")}}
                                                             value="{{$items->id}}">{{$items->guestname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <?php
                                    $startdate = date("Y-m-d", strtotime("$reservation->start"));
                                    $enddate = date("Y-m-d", strtotime("$reservation->end -1 days"));
                                    ?>
                                    <div class="form-group">
                                        <label for="room_id">Select Room</label>
                                        {{--for loop lagouni--}}
                                        <select class="form-control" id="room_id" name="room_id">
                                            @foreach($room as $items)
                                                <option {{($items->id == $reservation->room_id)?("selected"):("")}}
                                                        value="{{$items->id}}">{{$items->roomno}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="start">CheckIn Date:</label>
                                        <input value="{{$startdate}}" type="date" class="form-control"
                                               id="start" name="start"
                                               placeholder="Enter Check start">
                                    </div>
                                    <div class="form-group">
                                        <label for="end">CheckOut Date:</label>
                                        <input value="{{$enddate}}" type="date" class="form-control"
                                               id="end" name="end"
                                               placeholder="Enter Check end">
                                    </div>
                                    <div class="form-group">
                                        <label for="numberofguests">Number Of Guests:</label>
                                        <input value="{{$reservation->numberofguests}}" type="text" class="form-control"
                                               id="numberofguests"
                                               name="numberofguests" placeholder="Enter  numberofguests">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input value="{{$reservation->price}}" type="text" class="form-control"
                                               id="price" name="price"
                                               placeholder="Enter  price">
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
                </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
@endsection
