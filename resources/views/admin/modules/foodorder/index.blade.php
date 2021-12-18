@extends("admin.layouts.master")
@section("content")

    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Manage FoodOrder</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/foodorders')}}">Home</a></li>
                            <li class="breadcrumb-item active">FoodOrder</li>
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
                                @can('foodorder-create')
                                    <h3 style="float:right;" class="card-title"><a
                                            href="{{ route('foodorder.create') }}"class="btn btn-success  btn-sm">Add</a>
                                    </h3>
                                @endcan

                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Guest</th>
                                        <th>Order</th>
                                        <th>Quantity</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($orders as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{ $item->guest->guestname }}</td>
                                            <td>{{ $item->food->mealtype }} : {{ $item->food->foodname }}</td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->created_at }}</td>
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
