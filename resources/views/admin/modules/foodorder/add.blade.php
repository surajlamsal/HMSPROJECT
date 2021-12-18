@extends("admin.layouts.master")
@section("content")

    <!--suppress SpellCheckingInspection -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>FoodOrder</h1>
                    </div>
                    @if(session('status'))

                    @endif
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/foodorder')}}">FoodOrder</a></li>
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
                                <h3 class="card-title">Add FoodOrder</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{route('foodorder.store')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body">


                                    <div class="form-group">
                                        <label for="mealtype">Floor</label>
                                        <select class="form-control" id="mealtype" name="mealtype">
                                            @for($i=0;$i<count(Config::get('constants.mealtype'));$i++)

                                                <option
                                                    value="{{Config::get('constants.mealtype')[$i]}}">{{Config::get('constants.mealtype')[$i]}}</option>

                                            @endfor


                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="foodordername">FoodOrder Name</label>
                                        <input type="text" min="0" class="form-control" id="foodordername" name="foodordername"
                                               placeholder="Enter FoodOrder Name">
                                    </div>

                                    <div class="form-group">
                                        <label for="foodorderprice">FoodOrder Price</label>
                                        <input type="text" min="0" class="form-control" id="foodorderprice" name="foodorderprice"
                                               placeholder="Enter FoodOrder Price">
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
