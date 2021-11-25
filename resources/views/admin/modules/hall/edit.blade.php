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
                                <h3 class="card-title">Edit Hall</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('halltype.update',$halltype->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$halltype->id}}" name="id">

                                <div class="card-body">

                                    <div class="form-group">
                                    <label for="">Hall name:</label>
                                    <input type="text" name="name" placeholder="Enter hall name" value="{{$halltype->name}}"><br><br>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Description:</label> <br/>
                                    <textarea name="description" placeholder="About hall" >{{$halltype->description}}</textarea> <br><br>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Child:</label>
                                      <input type="number" name="childoccupancy" value="{{$halltype->childoccupancy}}">

                                     <label for="">Adult:</label>
                                       <input type="number" name="adultoccupancy" value="{{$halltype->adultoccupancy}}"><br><br>
                                    </div>

                                    <div class="form-group">
                                    <label for="floor">Floor:</label>
                                    <select  class="form-control" id="floor" name="floor">

                                        @foreach($floor as $items)

                                            @if($halltype->floor == $items->id)
                                                <option selected
                                                        value="{{$items->id}}">
                                                        {{$items->floorname}}</option>
                                            @else
                                                <option value="{{$items->id}}">
                                                {{$items->floorname}}</option>
                                            @endif

                                        @endforeach

                                        </select>
                                    </div>

                                    <div class="form-group">
                                    <label for="">Base Price:</label>
                                    <input type="number" name="baseprice" value="{{$halltype->baseprice}}"><br><br>
                                    </div>

                                    <div class="form-group">
                                    <label for="">High Price:</label>
                                    <input type="number" name="highprice" value="{{$halltype->highprice}}"><br><br>
                                    </div>

                                    <div class="form-group">
                                        <label for="amenities_id">Select Amenities </label>
                                        <select  class="form-control" id="amenities_id" name="amenities_id">

                                        @foreach($amenities as $items)

                                            @if($halltype->amenities == $items->id)
                                                <option selected
                                                        value="{{$items->id}}">
                                                        {{$items->amenitiesname}}</option>
                                            @else
                                                <option value="{{$items->id}}">
                                                {{$items->amenitiesname}}</option>
                                            @endif

                                        @endforeach

                                        </select>
                                    </div>



                                    <div class="form-group">
                                    <label for="">Add icon:</label>
                                    <input type="file" name="doc"><br><br>
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
