<?php

namespace App\Http\Controllers;

use App\Models\Floor;
use App\Models\Room;
use App\Models\Roomtype;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class RoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:room-list|room-create|room-edit|room-delete', ['only' => ['index']]);
        $this->middleware('permission:room-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:room-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:room-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $base_table = (new Room())->getTable();
        $room = Room::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        //dd($room);
        return view('admin.modules.room.index', compact('room', 'base_table'));
    }

    public function create()
    {

        $floor = Floor::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        $roomtype = Roomtype::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        return view('admin.modules.room.add', compact('floor', 'roomtype'));
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $room = new Room;
        $room->roomno = $request->input('roomno');
        $room->floor_id = $request->input('floor_id');
        $room->roomdescription = $request->input('roomdescription');
        $room->roomtype_id = $request->input('roomtype_id');
        $room->created_by = $user->id;
        $room->price = $request->price;
        $room->created_at = Carbon::now()->toDateTimeString();
        $room->save();
        Session::put('operationMessage', 'insertSuccess');
        return redirect('/room');
    }

    public function edit($id)
    {
        $floor = Floor::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        $roomtype = Roomtype::select('*')
            ->where([
                ['deletedstatus', '=', '0']
            ])
            ->get();
        $room = Room::find($id);
        return view('admin.modules.room.edit', compact('room', 'floor', 'roomtype'));
    }

    public function update(Request $request, $id)
    {
        // $request->validate(['price' => 'required|integer']);

        $user = Auth::user();
        $room = Room::find($id);
        $room->roomno = $request->input('roomno');
        $room->floor_id = $request->input('floor_id');
        $room->roomdescription = $request->input('roomdescription');
        $room->roomtype_id = $request->input('roomtype_id');
        $room->updated_by = $user->id;
        $room->price = $request->price;
        $room->updated_at = Carbon::now()->toDateTimeString();
        $room->update();
        Session::put('operationMessage', 'updateSuccess');
        return redirect('/room');
    }
}
