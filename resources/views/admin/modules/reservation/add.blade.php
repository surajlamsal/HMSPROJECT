@extends("admin.layouts.master")
@section("content")
    <!--suppress SpellCheckingInspection -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Reservation</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/reservation')}}">Reservation</a></li>
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
                                <h3 class="card-title">Add Reservation</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('reservation.store')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="guest_id">Select Guest</label>
                                        {{--for loop lagouni--}}
                                        <select class="form-control" id="guest_id" name="guest_id">
                                            <option value="">Select Guest</option>

                                        @foreach($guest as $items)
                                                <option value="{{$items->id}}">{{$items->guestname}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="room_id">Select Room</label>
                                        {{--for loop lagouni--}}
                                        <select class="form-control" id="room_id" name="room_id">
                                            <option value="">Select Room</option>
                                            @foreach($room as $items)
                                                <option value="{{$items->id}}">{{$items->roomno}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="in_date">CheckIn Date:</label>
                                        <input type="date" class="form-control" id="in_date" name="in_date"
                                               placeholder="Enter Check in_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="out_date">CheckOut Date:</label>
                                        <input type="date" class="form-control" id="out_date" name="out_date"
                                               placeholder="Enter Check out_date">
                                    </div>
                                    <div class="form-group">
                                        <label for="numberofguests">Number Of Guests:</label>
                                        <input type="text" class="form-control" id="numberofguests"
                                               name="numberofguests" placeholder="Enter  numberofguests">
                                    </div>
                                    <div class="form-group">
                                        <label for="price">Price:</label>
                                        <input type="text" class="form-control" id="price" name="price"
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
