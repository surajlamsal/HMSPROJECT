@extends("admin.layouts.master")
@section("content")

    <!--suppress SpellCheckingInspection -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Room Type</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/roomtype')}}">Room Type</a></li>
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
                                <h3 class="card-title">Add Room Type</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('roomtype.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="roomtypename">TypeName</label>
                                        <input type="text" class="form-control" id="roomtypename" name="roomtypename"
                                               placeholder="Enter Room Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" id="description" name="description"
                                               placeholder="Enter Room Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="occupancy">Occupancy</label>
                                        <select class="form-control" id="occupancy" name="occupancy">
                                            <option selected="selected" value="">Select occupancy</option>
                                            <option value="Adult">Adult</option>
                                            <option value="Child">Child</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="roomtypeimage">Image</label>
                                        <input type="file" class="form-control" id="roomtypeimage" name="roomtypeimage">
                                    </div>

                                    <div class="form-group">
                                        <label for="baseoccupancy">Base occupancy</label>
                                        <input type="text" class="form-control" id="baseoccupancy" name="baseoccupancy"
                                               placeholder="Enter Room Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="higheroccupancy">Higher occupancy</label>
                                        <input type="text" class="form-control" id="higheroccupancy"
                                               name="higheroccupancy" placeholder="Enter Room Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="extrabed">Extra Bed</label>
                                        <select class="form-control" id="extrabed" name="extrabed">
                                            <option selected="selected" value="">Select extrabed</option>
                                            <option value="Yes">Yes</option>
                                            <option value="No">No</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="baseprice">Base Price</label>
                                        <input type="text" class="form-control" id="baseprice" name="baseprice"
                                               placeholder="Enter Room Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="additionalprice">Additional Price</label>
                                        <input type="text" class="form-control" id="additionalprice"
                                               name="additionalprice" placeholder="Enter Room Type Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="extrabedprice">Extra Bed Price</label>
                                        <input type="text" class="form-control" id="extrabedprice" name="extrabedprice"
                                               placeholder="Enter Extra Bed Price">
                                    </div>

                                    <div class="form-group">
                                        <label for="amenities_id">Select Amenities</label>
                                        {{--for loop lagouni--}}
                                        <select multiple class="form-control" id="amenities_id" name="amenities_id[]">
                                            @foreach($amenities as $items)
                                            <option value="{{$items->id}}">{{$items->amenitiesname}}</option>
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
