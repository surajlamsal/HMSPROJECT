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
                            <li class="breadcrumb-item"><a href="{{url('/halltype')}}">Hall Type</a></li>
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
                                <h3 class="card-title">Add Hall</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('halltype.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="name">Hall name:</label>
                                        <input class="form-control"  type="text" name="name" placeholder="Enter hall name">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description:</label>
                                        <input type="text" class="form-control" id="description" name="description" placeholder="Enter Hall Description">
                                    </div>

                                    <div class="form-group">
                                    <label for="childoccupancy">Child:</label>
                                      <input class="form-control"  type="number" name="childoccupancy">

                                     <label for="adultoccupancy">Adult:</label>
                                       <input class="form-control"  type="number" name="adultoccupancy">
                                    </div>

                                    <div class="form-group">
                                    <div class="form-group">
                                        <label for="floor">Select Floor</label>
                                        <select  class="form-control" id="floor" name="floor">
                                            @foreach($floor as $items)
                                            <option value="{{$items->id}}">{{$items->floorname}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Baseprice:</label>
                                      <input class="form-control"  type="number" name="baseprice">

                                     <label for="">Highprice:</label>
                                       <input  class="form-control" type="number" name="highprice">
                                    </div>

                                    <div class="form-group">
                                        <label for="amenities_id">Select Amenities</label>
                                        <select multiple class="form-control" id="amenities_id" name="amenities_id[]">
                                            @foreach($amenities as $items)
                                            <option value="{{$items->id}}">{{$items->amenitiesname}}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="form-group">
                                    <label for="">Add icon:</label>
                                    <input class="form-control"  type="file" name="doc">
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
