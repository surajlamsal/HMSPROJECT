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
        public function __construct ()
        {
            $this->middleware('permission:reservation-list|reservation-create|reservation-edit|reservation-delete', ['only' => ['index']]);
            $this->middleware('permission:reservation-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:reservation-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:reservation-delete', ['only' => ['destroy']]);
        }

        public function index ()
        {
            $reservation = Reservation::select('*')
                                      ->where([
                                                  ['deletedstatus', '=', '0'],
                                                  ['checkOutFlag', '=', 'No'],
                                              ])
                                      ->with('reservation_guest')
                                      ->whereHas('reservation_guest', function ($sub) {
                                          $sub->select('guestname');
                                      })
                                      ->with('reservation_room')
                                      ->whereHas('reservation_room', function ($sub) {
                                          $sub->select('roomno');
                                      })
                                      ->get();
            return view('admin.modules.reservation.index', compact('reservation'));
        }

        public function create ()
        {
            $guest = Guest::select('*')
                          ->where([
                                      ['deletedstatus', '=', '0']
                                  ])
                          ->get();
            $room = Room::select('*')
                        ->where([
                                    ['deletedstatus', '=', '0'],
                                    ['availability', '=', 'Yes'],
                                ])
                        ->get();
            return view('admin.modules.reservation.add', compact('guest', 'room'));
        }

        public function store (Request $request)
        {
            $reservation = new Reservation;
            $reservation->guest_id = $request->input('guest_id');
            $reservation->room_id = $request->input('room_id');
            $reservation->in_date = $request->input('in_date');
            $reservation->out_date = $request->input('out_date');
            $reservation->numberofguests = $request->input('numberofguests');
            $reservation->price = $request->input('price');
            $room = Room::find($reservation->room_id);
            $room->availability = "No";
            $room->update();
            $reservation->save();
            return redirect('/reservation');
        }

        public function edit ($id)
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
            $reservation->in_date = date('Y-m-d', strtotime($reservation->in_date));
            $reservation->out_date = date('Y-m-d', strtotime($reservation->out_date));
            return view('admin.modules.reservation.edit', compact('reservation', 'guest', 'room'));
        }

        public function update (Request $request, $id)
        {

            $reservation = Reservation::find($id);
            $room = Room::find($reservation->room_id);
            $room->availability = "Yes";
            $room->update();
            $reservation->guest_id = $request->input('guest_id');
            $reservation->room_id = $request->input('room_id');
            $reservation->in_date = $request->input('in_date');
            $reservation->out_date = $request->input('out_date');
            $reservation->numberofguests = $request->input('numberofguests');
            $reservation->price = $request->input('price');
            $room = Room::find($reservation->room_id);
            $room->availability = "No";
            $room->update();
            $reservation->update();
            return redirect('/reservation');


        }

        public function checkOutThis ()
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

        public function deletereservation ($id)
        {
            $reservations = Reservation::find($id);
            $reservations->deletedstatus = "1";
            $reservations->update();
        }
    }
