@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Room Type</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Room Type</li>
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
                                @can('roomtype-create')
                                    <h3 style="float:right;" class="card-title"><a
                                            href="{{ route('roomtype.create') }}"class="btn btn-success  btn-sm">Add</a>
                                    </h3>
                                @endcan

{{--                                <h3 style="float:right;" class="card-title"><a href="{{url('/addroomtype')}}">Add</a></h3>--}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Room Type Name</th>
                                        <th>Room Type Occupancy</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($roomtype as $item)
                                        <tr>
                                            <td>{{$item->roomtypename}}</td>
                                            <td>{{$item->occupancy}}</td>
                                            <td>
                                                @can('roomtype-edit')

                                                    <a href="{{route('roomtype.edit',$item->id)}}"
                                                       class="btn btn-primary  btn-sm">Edit</a>
                                                @endcan
{{--                                                <a href="{{url('editroomtype/'.$item->id)}}"--}}
{{--                                                   class="btn btn-primary  btn-sm">Edit</a>--}}
                                            </td>
                                            <td>
                                                @can('roomtype-delete')
                                                    <a id="{{$item->id}}" onclick="deleteRecord(this.id,this)"
                                                       href="javascript:void(0);"
                                                       class="btn btn-danger  btn-sm">Delete</a>
                                                @endcan
{{--                                            <a id="{{$item->id}}" onclick="deleteRecord(this.id,this)"--}}
{{--                                                   href="javascript:void(0);"--}}
{{--                                                   class="btn btn-danger  btn-sm">Delete</a>--}}
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
