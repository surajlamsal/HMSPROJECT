<?php
    /** @noinspection SpellCheckingInspection */

    namespace App\Http\Controllers;

    use App\Models\Roomtype;
    use App\Models\Amenities;
    use Illuminate\Support\Facades\File;
    use Carbon\Carbon;

    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    use Illuminate\Http\Request;

    class RoomtypeController extends Controller
    {
        public function __construct ()
        {
            $this->middleware('permission:roomtype-list|roomtype-create|roomtype-edit|roomtype-delete', ['only' => ['index']]);
            $this->middleware('permission:roomtype-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:roomtype-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:roomtype-delete', ['only' => ['destroy']]);
        }

        public function index ()
        {
            $base_table = (new Roomtype())->getTable();

            $roomtype = Roomtype::select('*')
                                ->where([
                                            ['deletedstatus', '=', '0']
                                        ])
                                ->get();

            return view('admin.modules.roomtype.index', compact('roomtype','base_table'));
        }

        public function create ()
        {
            $amenities  = Amenities::select('*')
                                 ->where([
                                             ['deletedstatus', '=', '0']
                                         ])
                                 ->get();
            return view('admin.modules.roomtype.add', compact('amenities'));
        }

        public function store (Request $request)
        {
            $user = Auth::user();

            $roomtype = new Roomtype;
            $roomtype->roomtypename = $request->input('roomtypename');
            $roomtype->description = $request->input('description');
            $roomtype->occupancy = $request->input('occupancy');
            $roomtype->baseoccupancy = $request->input('baseoccupancy');
            $roomtype->higheroccupancy = $request->input('higheroccupancy');
            $roomtype->extrabed = $request->input('extrabed');
            $roomtype->baseprice = $request->input('baseprice');
            $roomtype->additionalprice = $request->input('additionalprice');
            $roomtype->extrabedprice = $request->input('extrabedprice');
            $roomtype->amenities_id = json_encode($request->input('amenities_id'));
            $roomtype->created_by = $user->id;
            $roomtype->created_at = Carbon::now()->toDateTimeString();

            if ($request->hasFile('roomtypeimage')) {
                $file = $request->file('roomtypeimage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/roomtype', $filename);
                $roomtype->roomtypeimage = $filename;
            }
            $roomtype->save();
            Session::put('operationMessage', 'insertSuccess');

            return redirect('/roomtype');
        }

        public function edit ($id)
        {
          $amenities = Amenities::select('*')
                                  ->where([
                                              ['deletedstatus', '=', '0']
                                          ])
                                  ->get();
            $roomtype = Roomtype::find($id);
            /*echo "<pre>";
            print_r($amenities);*/
            return view('admin.modules.roomtype.edit', compact('amenities', 'roomtype'));
        }

        public function update (Request $request, $id)
        {
            $user = Auth::user();

            $roomtype = Roomtype::find($id);
            $roomtype->roomtypename = $request->input('roomtypename');
            $roomtype->description = $request->input('description');
            $roomtype->occupancy = $request->input('occupancy');
            $roomtype->baseoccupancy = $request->input('baseoccupancy');
            $roomtype->higheroccupancy = $request->input('higheroccupancy');
            $roomtype->extrabed = $request->input('extrabed');
            $roomtype->baseprice = $request->input('baseprice');
            $roomtype->additionalprice = $request->input('additionalprice');
            $roomtype->extrabedprice = $request->input('extrabedprice');
            $roomtype->amenities_id = json_encode($request->input('amenities_id'));
            $roomtype->updated_by = $user->id;
            $roomtype->updated_at = Carbon::now()->toDateTimeString();
            /*$test = $request->input('amenities_id');
            echo "<pre>";
            print_r($test);die;*/
            //$amenities->amenitiesicon =$request->input('amenitiesicon');

            if ($request->hasFile('roomtypeimage')) {
                $destination = 'uploads/roomtype/' . $roomtype->roomtypeimage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('roomtypeimage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/roomtype', $filename);
                $roomtype->roomtypeimage = $filename;
            }
            $roomtype->update();
            Session::put('operationMessage', 'updateSuccess');

            return redirect('/roomtype');


        }

        public function deleteroomtype ($id)
        {
            $roomtypes = Roomtype::find($id);
            $roomtypes->deletedstatus = "1";
            $roomtypes->update();
            return redirect('/roomtype')->with('status', 'deleted succesfully');
        }


    }
