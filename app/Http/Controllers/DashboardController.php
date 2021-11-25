<?php

    namespace App\Http\Controllers;

    use App\Models\Dashboard;
    use App\Models\Guest;
    use App\Models\Reservation;
    use App\Models\Room;
    use Illuminate\Http\Request;

    class DashboardController extends Controller
    {
        public function __construct ()
        {
            //$this->middleware('permission:dashboard-list', ['only' => ['index']]);
        }

        public function index ()
        {
            $bookings = Reservation::select('*')
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
                                   ->count();
            $guests = Guest::select('*')
                           ->where([
                                       ['deletedstatus', '=', '0']
                                   ])
                           ->count();
            $rooms = Room::select('*')
                         ->where([
                                     ['deletedstatus', '=', '0'],
                                     ['availability', '=', 'YES'],
                                 ])
                         ->count();
            return view('admin.modules.dashboard.index', compact('bookings', 'guests', 'rooms'));
        }


        public function create ()
        {
        }

        public function store (Request $request)
        {
        }


        public function show (Dashboard $dashboard)
        {
        }


        public function edit (Dashboard $dashboard)
        {
        }

        public function update (Request $request, Dashboard $dashboard)
        {
        }


        public function destroy (Dashboard $dashboard)
        {
        }
    }
