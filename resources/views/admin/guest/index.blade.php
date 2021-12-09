@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Guest Type</h1>
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
                            <div class="card-header">
                                <h3 style="float:right;" class="card-title"><a href="{{url('/archived')}}">Go to
                                                                                                           archive</a>
                                </h3><br>
                                @can('guest-create')
                                    <h3 style="float:right;" class="card-title"><a href="{{route('guest.create')}}">Add
                                                                                                                    Guest</a>
                                    </h3>
                                    <i class="fa-solid fa-pen-to-square"></i>
                                @endcan
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>

                                    <th>Guest Name</th>
                                    <th>Phone No</th>
                                    <th>Edit</th>
                                    <th>Archive</th>
                                    </thead>
                                    <tbody>
                                    @foreach ($guest as $item)
                                        <tr>
                                            <td>{{$item->guestname}}</td>
                                            <td>{{$item->phone}}</td>
                                            <td>
                                                @can('guest-edit')
                                                    <h3 style="float:right;" class="card-title"><a
                                                            href="{{ route('guest.edit',$item->id) }}"
                                                            class="btn btn-primary  btn-sm">Edit</a>
                                                    </h3>
                                                @endcan

                                            </td>
                                            <td>
                                                @can('guest-delete')
                                                    <a id="{{$item->id}}" onclick="deleteRecord(this.id,this)"
                                                       href="javascript:void(0);"
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
