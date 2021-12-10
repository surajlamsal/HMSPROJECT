<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Guest;
use App\Models\Reservation;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        //$this->middleware('permission:dashboard-list', ['only' => ['index']]);
    }

    public function index()
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
        $users = User::select('*')
            ->where([
            ])
            ->count();
        return view('admin.modules.dashboard.index', compact('bookings', 'guests', 'rooms', 'users'));
    }
}
