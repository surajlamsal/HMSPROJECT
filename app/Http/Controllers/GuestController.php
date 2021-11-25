<?php

    namespace App\Http\Controllers;

    use App\Models\Guest;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

// use Carbon\Carbon;
    // use Illuminate\Http\Request;
    // use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;


    class GuestController extends Controller
    {
        public function __construct ()
        {
            $this->middleware('permission:guest-list|guest-create|guest-edit|guest-delete', ['only' => ['index']]);
            $this->middleware('permission:guest-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:guest-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:guest-delete', ['only' => ['destroy']]);
        }
        public function index ()
        {
            $base_table = (new Guest())->getTable();

            $guest = Guest::select('*')
                          ->where([
                                      ['deletedstatus', '=', '0']
                                  ])
                          ->get();
            $data = compact('guest', 'base_table');
            return view('admin.guest.index')->with($data);
        }

        public function archive ()
        {
            $guest = Guest::select('*')
                          ->where([
                                      ['deletedstatus', '=', '1']
                                  ])
                          ->get();
            $data = compact('guest');
            return view('admin.guest.archived')->with($data);
        }

        public function create ()
        {
            $guest = Guest::select('*')->get();
            return view('admin.guest.add', compact('guest'));
        }

        public function store (Request $request)
        {
            $user = Auth::user();

            $guest = new Guest;
            $guest->guestname = $request->input('guestname');
            $guest->address = $request->input('address');
            $guest->email = $request->input('email');
            $guest->phone = $request->input('phone');
            $guest->citizenship = $request->input('citizenship');
            $guest->roomno = $request->input('roomno');
            $guest->checkin = $request->input('checkin');
            $guest->checkout = $request->input('checkout');
            $guest->created_by = $user->id;
            $guest->created_at = Carbon::now()->toDateTimeString();
            $guest->save();
            Session::put('operationMessage', 'insertSuccess');

            return redirect('/guest');
        }

        public function edit ($id)
        {
            $guest = Guest::find($id);
            return view('admin.guest.edit', compact('guest'));
        }

        public function update (Request $request, $id)
        {
            $user = Auth::user();

            $guest = Guest::find($id);
            $guest->guestname = $request->input('guestname');
            $guest->address = $request->input('address');
            $guest->email = $request->input('email');
            $guest->phone = $request->input('phone');
            $guest->citizenship = $request->input('citizenship');
            $guest->roomno = $request->input('roomno');
            $guest->checkin = $request->input('checkin');
            $guest->checkout = $request->input('checkout');
            $guest->updated_by = $user->id;
            $guest->updated_at = Carbon::now()->toDateTimeString();
            $guest->update();
            Session::put('operationMessage', 'updateSuccess');

            return redirect('/guest');
        }


      public function restore ($id)
         {
              $guest = Guest::select('*')
                          ->where([
                                      ['deletedstatus', '=', '0']
                                  ])
                          ->get();
            $data = compact('guest');
             return redirect('/guest')->with('status', 'Restored succesfully');
         }

        /* public function forceDelete ($id)
         {
             $guest = Guest::withTrashed()->find($id);
             if (!is_null($guest)) {
                 $guest->forceDelete();
             }
             return redirect()->back()->with('status', 'Deleted succesfully');
         }*/
    }
