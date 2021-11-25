<?php

namespace App\Http\Controllers;

use App\Models\Hall;

use App\Models\Amenities;
use App\Models\Floor;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\File;

class HallController extends Controller
{
    public function __construct ()
    {
        $this->middleware('permission:halltype-list|halltype-create|halltype-edit|halltype-delete', ['only' => ['index']]);
        $this->middleware('permission:halltype-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:halltype-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:halltype-delete', ['only' => ['destroy']]);
    }

    public function index()
    {
        $base_table = (new Hall())->getTable();
        $halltype = Hall::select('*')
        ->where([
                    ['deletedstatus', '=', '0']
                ])
        ->get();

return view('admin.modules.hall.index', compact('halltype','base_table'));
    }


    public function create ()
        {

            $amenities  = Amenities::select('*')
            ->where([
                        ['deletedstatus', '=', '0']
                    ])
            ->get();

            $floor  = Floor::select('*')
            ->where([
                        ['deletedstatus', '=', '0']
                    ])
            ->get();
         return view('admin.modules.hall.add', compact('amenities','floor'));
        }

    public function store (Request $request)
    {
        $user = Auth::user();
        $halltype = new Hall;
            $halltype->name = $request->input('name');
            $halltype->description = $request->input('description');
            $halltype->childoccupancy = $request->input('childoccupancy');
            $halltype->adultoccupancy = $request->input('adultoccupancy');
            $halltype->floor = $request->input('floor');
            $halltype->baseprice = $request->input('baseprice');
            $halltype->highprice = $request->input('highprice');
            $halltype->amenities_id = json_encode($request->input('amenities_id'));
            $halltype->created_by = $user->id;
            $halltype->created_at = Carbon::now()->toDateTimeString();

            if($request->hasfile('doc')){
                $file= $request->file('doc');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/hero/', $filename);
                $halltype->doc = $filename;
            }else{
                return $request;
                $halltype->doc = '';
            }
            $halltype->save();
            Session::put('operationMessage', 'insertSuccess');

            return redirect('/halltype');
    }

    public function edit ($id)
    {
        $amenities = Amenities::select('*')
        ->where([
                    ['deletedstatus', '=', '0']
                ])
        ->get();

        $floor = Floor::select('*')
        ->where([
                    ['deletedstatus', '=', '0']
                ])
        ->get();
         $halltype = Hall::find($id);
           /*echo "<pre>";
          print_r($amenities);*/
          return view('admin.modules.hall.edit', compact('amenities', 'halltype','floor'));
    }


    public function update (Request $request,  $id)
    {
        $user = Auth::user();

        $halltype = Hall::find($id);
            $halltype->name = $request->input('name');
            $halltype->description = $request->input('description');
            $halltype->childoccupancy = $request->input('childoccupancy');
            $halltype->adultoccupancy = $request->input('adultoccupancy');
            $halltype->floor = $request->input('floor');
            $halltype->baseprice = $request->input('baseprice');
            $halltype->highprice = $request->input('highprice');
            $halltype->amenities_id = json_encode($request->input('amenities_id'));
            $halltype->updated_by = $user->id;
            $halltype->updated_at = Carbon::now()->toDateTimeString();
            /*$test = $request->input('amenities_id');
            echo "<pre>";
            print_r($test);die;*/
            //$amenities->amenitiesicon =$request->input('amenitiesicon');

            if($request->hasfile('doc')){
                $file= $request->file('doc');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/hero/', $filename);
                $halltype->doc = $filename;
            }else{
                return $request;
                $halltype->doc = '';
            }

            $halltype->update();
            Session::put('operationMessage', 'updateSuccess');

            return redirect('/halltype');
    }


}
