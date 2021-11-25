<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Housekeeping;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HousekeepingController extends Controller
{
    public function __construct ()
    {
        $this->middleware('permission:housekeeping-list|housekeeping-create|housekeeping-edit|housekeeping-delete', ['only' => ['index']]);
        $this->middleware('permission:housekeeping-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:housekeeping-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:housekeeping-delete', ['only' => ['destroy']]);
    }
    public function index ()
    {
        $base_table = (new Housekeeping())->getTable();

        $housekeeping = Housekeeping::select('*')
                            ->where([
                                        ['deletedstatus', '=', 1]
                                    ])
                            ->get();

        return view('admin.modules.housekeeping.index', compact('housekeeping','base_table'));
    }

    public function create()
    {
        return view ('admin.modules.housekeeping.add');

    }

    public function store (Request $request)
    {
        $user = Auth::user();

        $housekeeping = new Housekeeping();
        $housekeeping->housekeepingname = $request->input('housekeepingname');
        $housekeeping->created_by = $user->id;
        $housekeeping->created_at = Carbon::now()->toDateTimeString();
        //$housekeeping->housekeepingicon =$request->input('housekeepingicon');

        if ($request->hasFile('housekeepingicon')) {
            $file = $request->file('housekeepingicon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/housekeeping', $filename);
            $housekeeping->housekeepingicon = $filename;
        }

        $housekeeping->save();
        Session::put('operationMessage', 'insertSuccess');

        return redirect('/housekeeping')->with('status', 'Inserted succesfully');
    }

    public function edit ($id)
    {
        $housekeeping = Housekeeping::find($id);
        return view('admin.modules.housekeeping.edit', compact('housekeeping'));
    }
    public function update (Request $request, $id)
    {
//print_r($request);die;
        $user = Auth::user();

        $housekeeping = Housekeeping::find($id);
        $housekeeping->housekeepingname = $request->input('housekeepingname');
        $housekeeping->updated_by = $user->id;
        $housekeeping->updated_at = Carbon::now()->toDateTimeString();
        //$housekeeping->housekeepingicon =$request->input('housekeepingicon');

        if ($request->hasFile('housekeepingicon')) {
            $destination = 'uploads/housekeeping/' . $housekeeping->housekeepingicon;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('housekeepingicon');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/housekeeping', $filename);
            $housekeeping->housekeepingicon = $filename;
        }

        $housekeeping->update();
        Session::put('operationMessage', 'updateSuccess');

        return redirect('/housekeeping')->with('status', 'Record upadted succesfully');
    }


}
