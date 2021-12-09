@extends('front.layout')

@section('title', 'HMS - Home')

@section('content')

    <main>
        <section id="hero-section" class="relative">
            <img src="{{ asset('images/home-hero-image.jpg') }}" alt="" class="w-full h-96 object-cover" />

            <div class="
            absolute
            bg-black bg-opacity-50
            inset-0
            flex
            items-center
            justify-center
          ">
                <div>
                    <h3 class="text-4xl font-bold text-white">Find Your Ideal Hotel</h3>
                </div>
            </div>
        </section>

        <section id="services" class="py-6">
            <div class="wrapper">
                <h3 class="text-center text-3xl font-bold mb-10">Services</h3>

                <div class="grid grid-cols-2 md:grid-cols-4 gap-3">
                    <div class="grid-card">
                        <div class="grid-header">Tours and Travels</div>
                        <div class="grid-desc">
                            Vehicles are available for tour and travels.
                        </div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-header">Free Wireless Internet Access</div>
                        <div class="grid-desc">Free Wireless Internet Access</div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-header">Baby Sitting on Request</div>
                        <div class="grid-desc">
                            Baby sitting are also available for the guests who have child
                        </div>
                    </div>

                    <div class="grid-card">
                        <div class="grid-header">Laundry Service</div>
                        <div class="grid-desc">
                            Free Laundry services are available to the guests who books
                            deluxe and advanced room.
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="gallery">
            <div class="grid grid-cols-2 md:grid-cols-4">
                <img class="w-full h-56 object-cover" src="/images/home/1.jpg" alt="" />
                <img class="w-full h-56 object-cover" src="/images/home/2.jpg" alt="" />
                <img class="w-full h-56 object-cover" src="/images/home/3.jpg" alt="" />
                <img class="w-full h-56 object-cover" src="/images/home/4.jpg" alt="" />
            </div>
        </section>
    </main>

@endsection
