<?php
    /** @noinspection SpellCheckingInspection */

    namespace App\Http\Controllers;

    use App\Models\Employee;
    use App\Models\Department;
    use App\Models\Role;
    use App\Models\Shift;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Session;

    use Illuminate\Support\Facades\File;


    class EmployeeController extends Controller
    {

        public function index ()
        {
            $base_table = (new Employee())->getTable();
            $employee = Employee::select('*')
                                ->where([
                                            ['deletedstatus', '=', '0']
                                        ])
                                ->get();
            return view('admin.modules.employee.index', compact('employee','base_table'));
        }

        public function create ()
        {
            $shift  = Shift::select('*')
            ->get();
            $department  = Department::select('*')
            ->get();
            $role  = Role::select('*')
            ->get();

            return view('admin.modules.employee.add',compact('shift','department','role'));
        }

        public function store (Request $request)
        {
            $user = Auth::user();

            $employee = new Employee;
            $employee->firstname = $request->input('firstname');
            $employee->lastname = $request->input('lastname');
            $employee->email = $request->input('email');
            $employee->password = $request->input('password');
            $employee->dob = $request->input('dob');
            $employee->phone = $request->input('phone');
            $employee->department = $request->input('department');
            $employee->role = $request->input('role');
            $employee->designation = $request->input('designation');
            $employee->address = $request->input('address');
            $employee->employeeimage = $request->input('employeeimage');
            $employee->citizenship = $request->input('citizenship');
            $employee->pannumber = $request->input('pannumber');
            $employee->dateofjoining = $request->input('dateofjoining');
            $employee->salary = $request->input('salary');
            $employee->shift = $request->input('shift');
            $employee->created_by = $user->id;
            $employee->created_at = Carbon::now()->toDateTimeString();




            if ($request->hasFile('employeeimage')) {
                $file = $request->file('employeeimage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee', $filename);
                $employee->employeeimage = $filename;
            }
            $employee->save();
            Session::put('operationMessage', 'insertSuccess');

            return redirect('/employee');
        }

        public function edit ($id)
        {
            $shift = Shift::select('*')
                                  ->where([
                                              ['deletedstatus', '=', '0']
                                          ])
                                  ->get();
             $role = Role::select('*')
                                  ->where([
                                              ['deletedstatus', '=', '0']
                                          ])
                                  ->get();
             $department = Department::select('*')
                                  ->where([
                                              ['deletedstatus', '=', '0']
                                          ])
                                  ->get();
            $employee = Employee::find($id);
            /*echo "<pre>";
            print_r($amenities);*/
            return view('admin.modules.employee.edit', compact('shift','role','department','employee'));
        }

        public function update (Request $request, $id)
        {
            $user = Auth::user();

            $employee = Employee::find($id);

            $employee->firstname = $request->input('firstname');
            $employee->lastname = $request->input('lastname');
            $employee->email = $request->input('email');
            $employee->password = $request->input('password');
            $employee->dob = $request->input('dob');
            $employee->phone = $request->input('phone');
            $employee->department = $request->input('department');
            $employee->role = $request->input('role');
            $employee->designation = $request->input('designation');
            $employee->address = $request->input('address');
            $employee->citizenship = $request->input('citizenship');
            $employee->pannumber = $request->input('pannumber');
            $employee->dateofjoining = $request->input('dateofjoining');
            $employee->salary = $request->input('salary');
            $employee->shift = $request->input('shift');
            $employee->updated_by = $user->id;
            $employee->updated_at = Carbon::now()->toDateTimeString();
            /*$test = $request->input('amenities_id');
            echo "<pre>";
            print_r($test);die;*/
            //$amenities->amenitiesicon =$request->input('amenitiesicon');

            if ($request->hasFile('employeeimage')) {
                $destination = 'uploads/employee/' . $employee->employeeimage;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('employeeimage');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/employee', $filename);
                $employee->employeeimage = $filename;
            }
            $employee->update();
            Session::put('operationMessage', 'updateSuccess');

            return redirect('/employee');


        }



    }
