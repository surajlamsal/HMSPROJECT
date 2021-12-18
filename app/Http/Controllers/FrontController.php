<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use Carbon\Carbon;
use App\Models\Room;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function home()
    {
        if(auth()->user() && auth()->user()->role == "Admin")
            return redirect('/admin');

        return redirect('/');
    }

    public function rooms(Request $request)
    {
        $rooms = Room::all();
        $start_date = "";
        $end_date = "";

        // Rooms
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);
            $now = now()->startOfDay();
            if ($start_date < $now  || $end_date <= $start_date) {
                return redirect()->route('front.rooms')
                    ->with('error', 'Invalid Date Provided! Please provide start date after today and end date after the start date!');
            }

            $booking_rooms = Reservation::whereBetween('start', [$start_date, $end_date])
                ->orWhereBetween('end', [$start_date, $end_date])
                ->get()
                ->pluck('room_id')
                ->toArray();

            $rooms = Room::whereNotIn('id', $booking_rooms)->get();

            $start_date = $start_date->format('Y-m-d');
            $end_date = $end_date->format('Y-m-d');
        }

        return view('front.rooms', compact('rooms', 'start_date', 'end_date'));
    }

    public function book(Request $request)
    {
        $rooms = [];
        $start_date = "";
        $end_date = "";

        // Rooms
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);

            $now = now()->startOfDay();
            if ($start_date < $now  || $end_date <= $start_date) {
                return redirect()->route('front.book')
                    ->with('error', 'Invalid Date Provided! Please provide start date after today and end date after the start date!');
            }

            $booking_rooms = Reservation::whereBetween('start', [$start_date, $end_date])
                ->orWhereBetween('end', [$start_date, $end_date])
                ->get()
                ->pluck('room_id')
                ->toArray();

            $rooms = Room::whereNotIn('id', $booking_rooms)->get();

            $start_date = $start_date->format('Y-m-d');
            $end_date = $end_date->format('Y-m-d');
        }

        $hide_image = true;

        return view('front.rooms', compact('rooms', 'start_date', 'end_date', 'hide_image'));
    }

    public function booking(Request $request, Room $room)
    {
        $start_date = "";
        $end_date = "";

        // Rooms
        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);

            $booking_rooms = Reservation::whereBetween('start', [$start_date, $end_date])
                ->orWhereBetween('end', [$start_date, $end_date])
                ->get()
                ->pluck('room_id')
                ->toArray();

            $start_date = $start_date->format('Y-m-d');
            $end_date = $end_date->format('Y-m-d');

            if (in_array($room->id, $booking_rooms)) {
                return redirect()->route('front.rooms')
                    ->with('error', "This has been already booked for $start_date to $end_date!");
            }
        }

        return view('front.booking', compact('room', 'start_date', 'end_date'));
    }

    public function gallery()
    {
        return view('front.gallary');
    }
    public function contact()
    {
        return view('front.contact');
    }
    public function signup()
    {
        return view('signup.contact');
    }

    public function bookNow(Request $request, Room $room)
    {
        $this->middleware('auth');

        $request->validate([
            'name' => ['required'],
            'start_date' => ['required', 'date', 'after:' . now()->startOfDay()],
            'end_date' => ['required', 'date', 'after:start_date'],
            'guest' => ['required', 'integer', 'gte:1'],
            'phone' => ['required', 'integer', 'digits:10'],
        ]);

        // Get Guest
        $guest = Guest::where('user_id', auth()->id())->first();
        if(!$guest) {
            $guest = Guest::where('email', $request->email)->first();
        }

        if (!$guest) {
            $guest = Guest::create([
                'guestname' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);
        }

        Reservation::create([
            'room_id' => $room->id,
            'guest_id' => $guest->id,
            'start'   => $request->start_date,
            'end'     => Carbon::parse($request->end_date)->addDays(1)->format('Y-m-d'),
            'numberofguests' => $request->guest,
            'price' => $room->price,
        ]);

        return redirect()->route('front.book')
            ->with('success', 'Your room has been booked successfully!');
    }

    public function kitchen()
    {
        $items = [];

        return view('front.kitchen', compact('items'));
    }

    public function orderKitchen(Request $request){
        $request->validate([
            'food_id' => 'required|exists:foods,id',
        ]);

        // Food Order Create

        return redirect('/kitchen')->with('success', 'Your food item has been ordered! It should arrive to your room shortly!');
    }
}

