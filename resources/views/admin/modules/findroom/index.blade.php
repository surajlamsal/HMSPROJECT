@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Find Room</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Find Room</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
    @if(session('status'))

    @endif
    <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Find Rooms</h3>
                            </div>

                            @can('floor-create')
                                <div class="card-body">
                                    <form action="{{ route('find-room') }}" method="get">

                                        <div class="d-flex justify-content-center">
                                            <div class="form-group mr-2">
                                                <label for="start_date">Start Date</label>
                                                <input type="date" name="start_date" id="start_date"
                                                       class="form-control" value="{{ request()->start_date ?? '' }}">
                                            </div>
                                            <div class="form-group mr-2">
                                                <label for="end_date">End Date</label>
                                                <input type="date" name="end_date" id="end_date" class="form-control"
                                                       value="{{ request()->end_date ?? '' }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="submitbutton">&nbsp;</label>
                                                <button id="submitbutton" type="submit" class="btn btn-primary form-control">Find Rooms</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>



                                @if(!empty(request()->start_date) && !empty(request()->end_date))
                                <!-- /.card-header -->
                                    <div class="card-body">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <td>SN</td>
                                                <td>Room No</td>
                                                <td>Room</td>
                                                <td>Floor Number</td>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($rooms as $room)
                                                <tr>
                                                    <td>{{ $loop->index+1 }}</td>
                                                    <td>{{ $room->roomno }}</td>
                                                    <td>{{ $room->roomdescription }}</td>
                                                    <td>{{ $room->floor->floornumber }}</td>
                                                    <td>
                                                        <a href="{{ route('reservation.create', ['room_id' => $room->id, 'start' => $start_date, 'end' => $end_date]) }}"
                                                           class="btn btn-primary">Reserve</a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.card-body -->
                                @endif





                            @endcan

                        </div>
                        <!-- /.card -->


                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

@endsection
