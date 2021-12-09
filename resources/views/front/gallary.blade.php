@extends('front.layout')

@section('title', 'HMS - Home')

@section('content')
    <main class="py-4 px-2">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white px-6 py-4 shadow rounded overflow-hidden mb-3">
                <h3 class="text-2xl font-bold mb-3 text-center">Gallery</h3>

                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                    <img src="images/home/1.jpg" class="w-full h-full object-cover" alt="">
                    <img src="images/home/2.jpg" class="w-full h-full object-cover" alt="">
                    <img src="images/home/3.jpg" class="w-full h-full object-cover" alt="">
                    <img src="images/home/4.jpg" class="w-full h-full object-cover" alt="">
                    <img src="images/home/1.jpg" class="w-full h-full object-cover" alt="">
                </div>
            </div>
        </div>
    </main>
@endsection
