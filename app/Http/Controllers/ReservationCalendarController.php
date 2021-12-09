<?php

    namespace App\Http\Controllers;

    use App\Models\Reservation;
    use Illuminate\Http\Request;

    class ReservationCalendarController extends Controller
    {
        public function index(Request $request)
        {
            if ($request->ajax()) {
                $data = Reservation::select('*')
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
                    ->get(['id', 'title', 'start', 'end']);
                //dd($data);
                /*echo "<pre>";
                print_r($data);*/
                foreach ($data as $datas) {


                    $datas['title'] = "Guest =" . $datas['reservation_guest']['guestname'] . ", Room=" .
                        $datas['reservation_room']['roomno'];
                }
                //$data[] = $datas;
                //dd($datas);
                return response()->json($data);
            }
            return view('admin.modules.reservation.reservationcalendar');
        }

        public function ajax(Request $request)
        {
            switch ($request->type) {

                case 'add':
                    $event = Reservation::create([
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);
                    return response()->json($event);
                case 'update':
                    $event = Reservation::find($request->id)->update([
                        'start' => $request->start,
                        'end' => $request->end,
                    ]);
                    return response()->json($event);
                case 'delete':
                    $event = Reservation::find($request->id)->delete();
                    return response()->json($event);
                default:
                    # code...
                    break;

            }
            return null;

        }

    }
