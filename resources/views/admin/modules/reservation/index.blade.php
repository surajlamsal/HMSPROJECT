@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Reservation</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Reservation</li>
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
                                <h3 class="card-title"></h3>

                                <h3 style="float:right;" class="card-title"><a href="{{ route('reservation.create') }}"class="btn btn-success  btn-sm">Add</a>
                                </h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Guest Name</th>
                                        <th>Room No</th>
                                        <th>In Date</th>
                                        <th>Out Date</th>
                                        <th>Number Of Guest</th>
                                        <th>Price</th>
                                        <th>Checkout</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($reservation as $item)
                                        <?php
                                        $startdate = date("Y-m-d", strtotime("$item->start"));
                                        $enddate = date("Y-m-d", strtotime("$item->end -1 days"));
                                        ?>
                                        <tr>
                                            <td>{{$item->reservation_guest->guestname}}</td>
                                            <td>{{$item->reservation_room->roomno}}</td>
                                            <td>{{$startdate}}</td>

                                            <td>{{$enddate}}</td>
                                            <td>{{$item->numberofguests}}</td>
                                            <td>{{$item->price}}</td>
                                            <td>
                                                @if($item->checkOutFlag === "No")
                                                    <a id="{{$item->id}}" onclick="checkOutThis(this.id,this)"
                                                       href="javascript:void(0);"
                                                       class="btn btn-danger  btn-sm">Checkout</a>
                                                @else
                                                    <a id="{{$item->id}}"
                                                       href="javascript:void(0);"
                                                       class="btn btn-primary  btn-sm">Checked out</a>

                                                @endif
                                            </td>


                                            <td>
                                                @can('reservation-edit')
                                                    <a href="{{ route('reservation.edit',$item->id) }}"
                                                       class="btn btn-primary  btn-sm">Edit</a>
                                                @endcan
                                            </td>
                                            <td>
                                                @can('reservation-delete')
                                                    <a href="{{url('deletereservation/'.$item->id)}}"
                                                       class="btn btn-danger  btn-sm">Delete</a>
                                                @endcan
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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
