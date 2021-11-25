<?php

    namespace App\Http\Controllers;

    use App\Models\Shift;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Session;

    class ShiftController extends Controller
    {
        public function __construct ()
        {
            $this->middleware('permission:shift-list|shift-create|shift-edit|shift-delete', ['only' => ['index']]);
            $this->middleware('permission:shift-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:shift-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:shift-delete', ['only' => ['destroy']]);
        }
        public function index ()
        {
            $base_table = (new Shift())->getTable();
            $shift = Shift::select('*')
                          ->where([
                                      ['deletedstatus', '=', '0']
                                  ])
                          ->get();
            return view('admin.modules.shift.index', compact('shift', 'base_table'));
        }


        public function create ()
        {
            return view('admin.modules.shift.add');

        }


        public function store (Request $request)
        {
            $user = Auth::user();
            $shift = new Shift();
            $shift->shiftname = $request->input('shiftname');
            $shift->created_by = $user->id;
            $shift->created_at = Carbon::now()->toDateTimeString();
            //$shift->shifticon =$request->input('shifticon');
            if ($request->hasFile('shifticon')) {
                $file = $request->file('shifticon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/shift', $filename);
                $shift->shifticon = $filename;
            }
            $shift->save();
            Session::put('operationMessage', 'insertSuccess');
            return redirect('/shift')->with('status', 'Inserted succesfully');

        }


        public function edit ($id)
        {
            $shift = Shift::find($id);
            return view('admin.modules.shift.edit', compact('shift'));
        }

        public function update (Request $request, $id)
        {
//print_r($request);die;
            $user = Auth::user();
            $shift = Shift::find($id);
            $shift->shiftname = $request->input('shiftname');
            $shift->updated_by = $user->id;
            $shift->updated_at = Carbon::now()->toDateTimeString();
            //$shift->shifticon =$request->input('shifticon');
            if ($request->hasFile('shifticon')) {
                $destination = 'uploads/shift/' . $shift->shifticon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('shifticon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/shift', $filename);
                $shift->shifticon = $filename;
            }
            $shift->update();
            Session::put('operationMessage', 'updateSuccess');
            return redirect('/shift')->with('status', 'Record upadted succesfully');
        }


    }
