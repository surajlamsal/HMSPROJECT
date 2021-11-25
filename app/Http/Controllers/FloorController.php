<?php

    namespace App\Http\Controllers;

    use App\Models\Floor;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    class FloorController extends Controller
    {
        public function __construct ()
        {
            $this->middleware('permission:floor-list|floor-create|floor-edit|floor-delete', ['only' => ['index']]);
            $this->middleware('permission:floor-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:floor-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:floor-delete', ['only' => ['destroy']]);
        }

        public function index ()
        {
            $base_table = (new Floor())->getTable();
            $floor = Floor::select('*')
                          ->where([
                                      ['deletedstatus', '=', '0']
                                  ])
                          ->get();
            return view('admin.modules.floor.index', compact('floor', 'base_table'));
        }

        public function create ()
        {
            return view('admin.modules.floor.add');
        }

        public function store (Request $request)
        {
            $user = Auth::user();
            $floor = new Floor;
            $floor->floorname = $request->input('floorname');
            $floor->floornumber = $request->input('floornumber');
            $floor->floordescription = $request->input('floordescription');
            $floor->created_by = $user->id;
            $floor->created_at = Carbon::now()->toDateTimeString();
            $floor->save();
            Session::put('operationMessage', 'insertSuccess');
            return redirect('/floor');
        }

        public function edit ($id)
        {
            $floor = Floor::find($id);
            return view('admin.modules.floor.edit', compact('floor'));
        }

        public function update (Request $request, $id)
        {
            $user = Auth::user();
            $floor = Floor::find($id);
            $floor->floorname = $request->input('floorname');
            $floor->floornumber = $request->input('floornumber');
            $floor->floordescription = $request->input('floordescription');
            $floor->updated_by = $user->id;
            $floor->updated_at = Carbon::now()->toDateTimeString();
            $floor->update();
            Session::put('operationMessage', 'updateSuccess');
            return redirect('/floor');
        }
    }
