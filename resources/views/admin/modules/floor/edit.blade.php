@extends("admin.layouts.master")
@section("content")
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Floor</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{url('/floor')}}">Floor</a></li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Floor</h3>
                            </div>
                            <form action="{{route('floor.update',$floor->id)}}" method="post"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <input type="hidden" value="{{$floor->id}}" name="id">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="floorname">Name</label>
                                        <input value={{$floor->floorname}} type="text" class="form-control"
                                               id="floorname" name="floorname" placeholder="Enter Floor Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="floornumber">Floor Number</label>
                                        <input value={{$floor->floornumber}} type="text" class="form-control"
                                               id="floornumber" name="floornumber" placeholder="Enter Floor Number">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea id="floordescription" name="floordescription" class="form-control"
                                                  rows="3"
                                                  placeholder="Enter Floor Description">{{$floor->floordescription}}</textarea>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
