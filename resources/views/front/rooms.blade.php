@extends('front.layout')

@section('title', 'HMS - Rooms')

@section('content')
    <main>
        <section id="hero">
            <img src="images/rooms-bg.jpg" alt="" class="w-full h-96 object-cover" />
        </section>
        <section>
            <div class="px-2 max-w-3xl mx-auto my-5">

                <div class="bg-white px-3 py-2 shadow rounded overflow-hidden mb-3">
                    <h3 class="text-center font-bold mb-4">Find Rooms</h3>
                    <form action="{{ route('front.rooms') }}" method="get">
                        <div class="flex w-full justify-center">
                            <div class="form-group px-2">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" id="start_date" class="rounded border-gray-300 outline-none focus:border-blue-600">
                            </div>
                            <div class="form-group px-2">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" id="end_date" class="rounded border-gray-300 outline-none focus:border-blue-600">
                            </div>
                            <div class="form-group pt-8">
                                <button class="btn">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                @foreach($rooms as $room)
                <!-- ROOM CARD -->
                <div class="bg-white mb-3 px-3 py-2 shadow rounded overflow-hidden grid grid-cols-6">
                    <div class="col-span-2 px-2 flex items-center justify-center">
                        <img src="images/rooms/room.jpg" alt="" class="h-autoobject-cover w-full rounded-lg">
                    </div>
                    <div class="col-span-4 px-6 py-4">
                        <h2 class="text-3xl font-bold mb-3">Room: {{ $room->roomno }}</h2>
                        <h4 class="text-xl font-bold mb-2">Max Guest: 5 / Floor: 5 / Room No: 11</h4>
                        <p>Experience our luxurious mountain view room with high speed internet access & ergonomic work...</p>

                        <div class="pt-6">
{{--                            <a href="view.php" class="px-4 py-2 text-white rounded shadow bg-orange-600 hover:bg-orange-700 mr-2">View Details</a>--}}
                            <a href="{{ route('front.booking', $room) }}" class="px-4 py-2 text-white rounded shadow bg-blue-600 hover:bg-blue-700 mr-2">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- END ROOM CARD -->
                @endforeach
            </div>
        </section>
    </main>

@endsection
