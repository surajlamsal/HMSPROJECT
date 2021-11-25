<?php
    /** @noinspection ALL */

    namespace App\Http\Controllers;

    use App\Models\Amenities;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\File;
    use Illuminate\Support\Facades\Session;

    class AmenitiesController extends Controller
    {
        public function __construct ()
        {
            $this->middleware('permission:amenities-list|amenities-create|amenities-edit|amenities-delete', ['only' => ['index']]);
            $this->middleware('permission:amenities-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:amenities-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:amenities-delete', ['only' => ['destroy']]);
        }

        //
        public function index ()
        {
            $base_table = (new Amenities())->getTable();
            $amenities = Amenities::select('*')
                                  ->where([
                                              ['deletedstatus', '=', '0']
                                          ])
                                  ->get();
            return view('admin.modules.amenities.index', compact('amenities', 'base_table'));
        }

        public function create ()
        {
            return view('admin.modules.amenities.add');
        }

        public function store (Request $request)
        {
            $user = Auth::user();
            $amenities = new Amenities();
            $amenities->amenitiesname = $request->input('amenitiesname');
            $amenities->amenitiesdescription = $request->input('amenitiesdescription');
            $amenities->created_by = $user->id;
            $amenities->created_at = Carbon::now()->toDateTimeString();
            //$amenities->amenitiesicon =$request->input('amenitiesicon');
            if ($request->hasFile('amenitiesicon')) {
                $file = $request->file('amenitiesicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/amenities', $filename);
                $amenities->amenitiesicon = $filename;
            }
            $amenities->save();
            Session::put('operationMessage', 'insertSuccess');
            return redirect('/amenities')->with('status', 'Inserted succesfully');

        }


        public function edit ($id)
        {
            $amenities = Amenities::find($id);
            return view('admin.modules.amenities.edit', compact('amenities'));
        }

        public function update (Request $request, $id)
        {
//print_r($request);die;
            $user = Auth::user();
            $amenities = Amenities::find($id);
            $amenities->amenitiesname = $request->input('amenitiesname');
            $amenities->amenitiesdescription = $request->input('amenitiesdescription');
            $amenities->updated_by = $user->id;
            $amenities->updated_at = Carbon::now()->toDateTimeString();
            //$amenities->amenitiesicon =$request->input('amenitiesicon');
            if ($request->hasFile('amenitiesicon')) {
                $destination = 'uploads/amenities/' . $amenities->amenitiesicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('amenitiesicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/amenities', $filename);
                $amenities->amenitiesicon = $filename;
            }
            $amenities->update();
            Session::put('operationMessage', 'updateSuccess');
            return redirect('/amenities')->with('status', 'Record upadted succesfully');
        }

        public function deleteamenities ($id)
        {
            $amenities = Amenities::find($id);
            $destination = 'uploads/amenities/' . $amenities->amenitiesicon;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $amenities->deletedstatus = "1";
            $amenities->update();
            return redirect('/amenities')->with('status', 'deleted succesfully');
        }
    }
