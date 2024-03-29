@extends('front.layout')

@section('title', 'HMS - Rooms')

@section('content')
    <main>
        @if(empty($hide_image))
        <section id="hero">
            <img src="images/rooms-bg.jpg" alt="" class="w-full h-96 object-cover" />
        </section>
        @else
        <section id="hero-section" class="relative">
            <img src="{{ asset('images/home-hero-image.jpg') }}" alt="" class="w-full h-20 object-cover" />

            <div class="
            absolute
            bg-black bg-opacity-50
            inset-0
            flex
            items-center
            justify-center
          ">
                <div>
                    <h3 class="text-4xl font-bold text-white">Book A Room</h3>
                </div>
            </div>
        </section>
        @endif

       <div class="max-w-3xl mx-auto">
        <x-alert />
       </div>


        <section>
            <div class="px-2 max-w-3xl mx-auto my-5">

                <div class="bg-white px-3 py-2 shadow rounded overflow-hidden mb-3">
                    <h3 class="text-center font-bold mb-4">Find Rooms</h3>
                    <form action="{{ empty($hide_image) ? route('front.rooms') : route('front.book') }}" method="get">
                        <div class="flex w-full justify-center">
                            <div class="form-group px-2">
                                <label for="start_date">Start Date</label>
                                <input value="{{ $start_date }}" type="date" name="start_date" id="start_date" class="rounded border-gray-300 outline-none focus:border-blue-600">
                            </div>
                            <div class="form-group px-2">
                                <label for="end_date">End Date</label>
                                <input value="{{ $end_date }}" type="date" name="end_date" id="end_date" class="rounded border-gray-300 outline-none focus:border-blue-600">
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
                        <h4 class="text-xl font-bold mb-2">Floor: {{ $room->floor->floornumber }} / {{ $room->roomtype->roomtypename }} </h4>
                        <h4 class="text-lg font-medium text-gray-700 mb-2">Rs. {{ $room->price }} per Day</h4>
                        <p>Experience our luxurious mountain view room with high speed internet access & ergonomic work...</p>

                        <div class="pt-6">
{{--                            <a href="view.php" class="px-4 py-2 text-white rounded shadow bg-orange-600 hover:bg-orange-700 mr-2">View Details</a>--}}
                            <a href="{{ route('front.booking', ['room' => $room, 'start_date' => $start_date, 'end_date' => $end_date]) }}" class="px-4 py-2 text-white rounded shadow bg-blue-600 hover:bg-blue-700 mr-2">Book Now</a>
                        </div>
                    </div>
                </div>
                <!-- END ROOM CARD -->
                @endforeach
            </div>
        </section>
    </main>

@endsection
