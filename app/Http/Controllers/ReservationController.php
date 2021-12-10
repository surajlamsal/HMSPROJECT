<?php

namespace App\Http\Controllers;

use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:reservation-list|reservation-create|reservation-edit|reservation-delete', ['only' => ['index']]);
        $this->middleware('permission:reservation-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:reservation-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:reservation-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $reservation = Reservation::get();
        return view('admin.modules.reservation.index', compact('reservation'));
    }

    public function create()
    {
        $guest = Guest::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        $room = Room::select('*')
            ->where([
                ['deletedstatus', '=', '0'],
//                                    ['availability', '=', 'Yes'],
            ])
            ->get();
        return view('admin.modules.reservation.add', compact('guest', 'room'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'start' => ['required', 'date'],
            'end' => ['required', 'date'],
            'guest_id' => ['required', 'integer'],
            'room_id' => ['required', 'integer'],
            'numberofguests' => ['required', 'integer'],
            'price' => ['required', 'integer'],

        ]);

        $start_date = Carbon::parse($request->start);
        $end_date = Carbon::parse($request->end);

        $booking_rooms = Reservation::whereBetween('start', [$start_date, $end_date])
            ->orWhereBetween('end', [$start_date, $end_date])
            ->get()
            ->pluck('room_id')
            ->toArray();

        if (in_array($request->room_id, $booking_rooms)) {
            die("Room not available");
        }

        $reservation = new Reservation;
        $reservation->guest_id = $request->input('guest_id');
        $reservation->room_id = $request->input('room_id');
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');
        $reservation->end = date("Y-m-d", strtotime("$reservation->end"));
        $reservation->numberofguests = $request->input('numberofguests');
        $reservation->price = $request->input('price');
        $room = Room::find($reservation->room_id);
        $room->availability = "No";
        $room->update();
        $reservation->save();
        return redirect('/reservation');
    }

    public function edit($id)
    {
        $guest = Guest::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        $room = Room::select('*')
            ->where([
                ['deletedstatus', '=', '0'],
            ])
            ->get();
        $reservation = Reservation::find($id);
        $reservation->start = date('Y-m-d', strtotime($reservation->start));
        $reservation->end = date('Y-m-d', strtotime($reservation->end));
        return view('admin.modules.reservation.edit', compact('reservation', 'guest', 'room'));
    }

    public function update(Request $request, $id)
    {

        $reservation = Reservation::find($id);
        $room = Room::find($reservation->room_id);
        $room->availability = "Yes";
        $room->update();
        $reservation->guest_id = $request->input('guest_id');
        $reservation->room_id = $request->input('room_id');
        $reservation->start = $request->input('start');
        $reservation->end = $request->input('end');
        $reservation->numberofguests = $request->input('numberofguests');
        $reservation->price = $request->input('price');
        $room = Room::find($reservation->room_id);
        $room->availability = "No";
        $room->update();
        $reservation->update();
        return redirect('/reservation');


    }

    public function checkOutThis()
    {
        /*echo "alert";
        die();*/
        $user = Auth::user();
        $base_table_id_value = $_REQUEST['base_table_id'];
        DB::table("reservations")
            ->where('id', $base_table_id_value)
            ->update(
                array('checkOutFlag' => 'Yes',
                    'checkOutFlag_by' => $user->id,
                    'checkOutFlag_at' => Carbon::now()->toDateTimeString()
                )
            );
        $reservation = Reservation::find($base_table_id_value);
        $room = Room::find($reservation->room_id);
        $room->availability = "Yes";
        $room->update();


    }

    public function deletereservation($id)
    {
        $reservations = Reservation::find($id);
        $reservations->deletedstatus = "1";
        $reservations->update();
    }

    public function reservationroomdetailajax(Request $request)
    {
        return $request;

    }

    public function findRooms(Request $request)
    {
        $request->validate([
            'start_date' => ['nullable', 'date'],
            'end_date' => ['nullable', 'date'],
        ]);

        $rooms = [];
        $start_date = "";
        $end_date = "";

        if (!empty($request->start_date) && !empty($request->end_date)) {
            $start_date = Carbon::parse($request->start_date);
            $end_date = Carbon::parse($request->end_date);

            $booking_rooms = Reservation::whereBetween('start', [$start_date, $end_date])
                ->orWhereBetween('end', [$start_date, $end_date])
                ->get()
                ->pluck('room_id')
                ->toArray();

            $rooms = Room::whereNotIn('id', $booking_rooms)->get();

        }

        if (!empty($start_date) && !empty($end_date)) {
            $start_date = $start_date->format('Y-m-d');
            $end_date = $end_date->format('Y-m-d');
        } else {
            $start_date = (string)$start_date;
            $end_date = (string)$end_date;
        }

        return view('admin.modules.findroom.index', compact('rooms', 'start_date', 'end_date'));
    }
}
