<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Shift;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index(Request $request)
    {

        $data = User::orderBy('id', 'DESC')->paginate(5);
        return view('admin.modules.users.index', compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }


    public function create()
    {

        $shift = Shift::pluck('shiftname')->all();
        $department = Department::pluck('departmentname')->all();
        $roles = Role::pluck('name','name')->all();
        return view('admin.modules.users.add', compact('roles', 'shift', 'department'));
    }


    public function store(Request $request)
    {
        /*$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required'
        ]);*/
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);


        if ($request->hasFile('employeeimage')) {
            $file = $request->file('employeeimage');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/employee', $filename);
            $input['employeeimage'] = $filename;
        }
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('admin.modules.users.show', compact('user'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();
        $shift = Shift::pluck('shiftname', 'id')->all();
        //


        $department = Department::pluck('departmentname', 'id')->all();
        //$userDepartment = Department::find($id);
        //$userDepartment = $user->hasDepartment->find($user->id);
        //dd($userDepartment->department);

        //
        //$userShift = $user->hasShift->pluck('id', 'shiftname')->all();
        return view('admin.modules.users.edit', compact('user', 'roles', 'userRole', 'shift', 'department'));
    }


    public function update(Request $request, $id)
    {

        /*$this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);*/
        $input = $request->all();

        //dd($input);
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        $user = User::find($id);

        //$input->dateofjoining = $request->input('dateofjoining');
        /*echo "<pre>";
        print_r($input);
        dd($user);
        dd($input['dateofjoining']);*/

        $user->update($input);


        DB::table('model_has_roles')->where('model_id', $id)->delete();
        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }


    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}
