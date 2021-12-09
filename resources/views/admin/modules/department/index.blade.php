@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage Department</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item active">department</li>
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
                                @can('department-create')
                                    <h3 style="float:right;" class="card-title"><a
                                            href="{{ route('department.create') }}"class="btn btn-success  btn-sm">Add</a>
                                    </h3>
                                @endcan
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>Department Name</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($department as $item)
                                        <tr>
                                            <td>{{$item->departmentname}}</td>
                                            <td>
                                                @can('department-edit')
                                                    <a href="{{ route('department.edit',$item->id) }}"
                                                       class="btn btn-primary  btn-sm">Edit</a>
                                                @endcan
                                            </td>

                                            <td>
                                                @can('department-delete')
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
