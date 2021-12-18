@extends('front.layout')

@section('title', 'HMS - Kitchen')

@section('content')
    <main>
       <div class="max-w-3xl mx-auto">
        <x-alert />
       </div>


        <section>
            <div class="px-2 max-w-3xl mx-auto my-5">
                <div class="bg-white px-3 py-2 shadow rounded overflow-hidden mb-3">
                    <h3 class="text-center font-bold mb-4">Order Foods</h3>
                </div>

                @foreach($foods as $food)
                <!-- ROOM CARD -->
                <div class="bg-white mb-3 px-3 py-2 shadow rounded overflow-hidden grid grid-cols-6">
                    <div class="col-span-4 px-6 py-4">
                            <h3 class="text-3xl font-bold mb-3">{{ $food->mealtype }}: {{ $food->foodname }}</h3>
                            <p class="text-lg">Rs: {{ $food->foodprice }}</p>

                            <form action="/kitchen" method="post" class="mt-3">
                                @csrf
                                <input type="hidden" name="food_id" value="{{ $food->id }}">
                                <input type="number" name="quantity" placeholder="Quantity" class="rounded px-2 py-2" min="1" value="1">
                                <button type="submit" class="px-4 py-2 text-white rounded shadow bg-blue-600 hover:bg-blue-700 mr-2">Order</button>
                            </form>
                    </div>
                </div>
                <!-- END ROOM CARD -->
                @endforeach
            </div>
        </section>
    </main>

@endsection
