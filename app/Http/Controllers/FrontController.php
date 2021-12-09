<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        return view('front.index');
    }

    public function home()
    {
        return redirect('/admin');
    }

    public function rooms(Request $request)
    {
        $rooms = Room::all();

        // Rooms
        if(!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);

            $booking_rooms = Reservation::whereBetween('start', [$start_date, $end_date])
                ->orWhereBetween('end', [$start_date, $end_date])
                ->get()
                ->pluck('room_id')
                ->toArray();

            $rooms = Room::whereNotIn('id', $booking_rooms)->get();

        }

        return view('front.rooms', compact('rooms'));
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

}
