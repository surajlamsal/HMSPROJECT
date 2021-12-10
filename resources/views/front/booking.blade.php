@extends('front.layout')
@section('title', 'Book a Room')
@section('content')
<main class="py-4 px-2">
    <div class="max-w-2xl mx-auto">
        <div class="bg-white px-6 py-4 shadow rounded overflow-hidden mb-3">
            <h3 class="text-2xl font-bold mb-3 text-center">Book a Room</h3>

            <x-alert />

            <form action="{{ route('front.book.now', $room) }}" method="post">
                @csrf
                <p class="text-center text-gray-600 mb-2">You are booking for: Room #{{ $room->roomno }}</p>
                <p class="text-center text-gray-600 text-sm mb-4">Rs. {{ $room->price }}/Day</p>
                <div class="form-group">
                    <label for="name">Your Name</label>
                    <input value="{{ old('name') }}" type="text" name="name" id="name" autofocus class="rounded w-full border-gray-300 outline-none focus:border-blue-600">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="form-group">
                        <label for="start">Start Date</label>
                        <input value="{{ !empty(old('start_date')) ? old('start_date') : $start_date }}" type="date" name="start_date" id="start" class="rounded w-full border-gray-300 outline-none focus:border-blue-600">
                    </div>

                    <div class="form-group">
                        <label for="end">End Date</label>
                        <input value="{{ !empty(old('end_date')) ? old('end_date') : $end_date }}"type="date" name="end_date" id="end" class="rounded w-full border-gray-300 outline-none focus:border-blue-600">
                    </div>
                </div>

                <div class="form-group">
                    <label for="guest">Number of Guest</label>
                    <input value="{{ old('guest') ?? 1 }}" min="0" type="number" name="guest" id="guest" class="rounded w-full border-gray-300 outline-none focus:border-blue-600">
                </div>

                <div class="form-group">
                    <label for="email">Your Email Address</label>
                    <input value="{{ old('email') }}" type="email" name="email" id="email" class="rounded w-full border-gray-300 outline-none focus:border-blue-600">
                </div>

                <div class="form-group">
                    <label for="phone">Your Phone Number</label>
                    <input value="{{ old('phone') }}" type="number" name="phone" id="phone" class="rounded w-full border-gray-300 outline-none focus:border-blue-600">
                </div>

                <button type="submit" class="w-full btn mt-4">
                    Book Now
                </button>
            </form>
        </div>
    </div>
</main>
@endsection