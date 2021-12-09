@extends("admin.layouts.master")
@section("content")
    <title>Archived</title>
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Archived Guest</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">Guests</li>
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
                            <!-- /.card-header -->
                            <div class="card-body">
                                <h3 style="float:right;" class="card-title"><a href="{{url('/guest')}}">Guest</a></h3>
                                <br>
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>

                                    <th>Guest Name</th>
                                    <th>Phone No</th>
                                    <th>Restore</th>
                                    <th>Delete</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($guest as $item)
                                        <tr>
                                            <td>{{$item->guestname}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                <a href="{{url('restore/'.$item->id)}}"
                                                   class="btn btn-primary  btn-sm">Restore</a>
                                            </td>
                                            <td>
                                                <a href="{{url('force-delete/'.$item->id)}}"
                                                   class="btn btn-danger  btn-sm">Delete</a>
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
