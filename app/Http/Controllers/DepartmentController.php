<?php

    namespace App\Http\Controllers;

    use App\Models\Department;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    class DepartmentController extends Controller
    {
        public function __construct ()
        {
            $this->middleware('permission:department-list|department-create|department-edit|department-delete', ['only' => ['index']]);
            $this->middleware('permission:department-create', ['only' => ['create', 'store']]);
            $this->middleware('permission:department-edit', ['only' => ['edit', 'update']]);
            $this->middleware('permission:department-delete', ['only' => ['destroy']]);
        }

        public function index ()
        {
            $base_table = (new Department())->getTable();
            $department = Department::select('*')
                                    ->where([
                                                ['deletedstatus', '=', '0']
                                            ])
                                    ->get();
            return view('admin.modules.department.index', compact('department', 'base_table'));
        }


        public function create ()
        {
            return view('admin.modules.department.add');

        }


        public function store (Request $request)
        {
            $user = Auth::user();
            $department = new Department();
            $department->departmentname = $request->input('departmentname');
            $department->created_by = $user->id;
            $department->created_at = Carbon::now()->toDateTimeString();
            //$shift->shifticon =$request->input('shifticon');
            if ($request->hasFile('departmenticon')) {
                $file = $request->file('departmenticon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/department', $filename);
                $department->departmenticon = $filename;
            }
            $department->save();
            Session::put('operationMessage', 'insertSuccess');
            return redirect('/department')->with('status', 'Inserted succesfully');

        }

        public function edit ($id)
        {
            $department = Department::find($id);
            return view('admin.modules.department.edit', compact('department'));
        }


        public function update (Request $request, $id)
        {
            $user = Auth::user();
            //print_r($request);die;
            $department = Department::find($id);
            $department->departmentname = $request->input('departmentname');
            $department->updated_by = $user->id;
            $department->updated_at = Carbon::now()->toDateTimeString();
            //$shift->shifticon =$request->input('shifticon');
            if ($request->hasFile('departmenticon')) {
                $destination = 'uploads/department/' . $department->departmenticon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('departmenticon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/department', $filename);
                $department->departmenticon = $filename;
            }
            $department->update();
            Session::put('operationMessage', 'updateSuccess');
            return redirect('/department')->with('status', 'Record upadted succesfully');
        }


    }
