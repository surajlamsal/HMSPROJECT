<?php

    namespace App\Http\Controllers;

    use App\Models\Permission;
    use Illuminate\Http\Request;

    class PermissionController extends Controller
    {
        public function index ()
        {
            $permission = Permission::select('*')
                                    ->where([
                                                ['deletedstatus', '=', '0']
                                            ])
                                    ->get();
            return view('admin.modules.permission.index', compact('permission'));
        }


        public function addpermission ()
        {
            return view('admin.modules.permission.add');

        }


        public function insertpermission (Request $request)
        {
            $permission = new Permission();
            $permission->permissionname = $request->input('permissionname');
            //$shift->shifticon =$request->input('shifticon');
            if ($request->hasFile('permissionicon')) {
                $file = $request->file('permissionicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/permission', $filename);
                $permission->permissionicon = $filename;
            }
            $permission->save();
            return redirect('/permission')->with('status', 'Inserted succesfully');

        }

        public function editpermission ($id)
        {
            $permission = Permission::find($id);
            return view('admin.modules.permission.edit', compact('permission'));
        }


        public function updatepermission (Request $request, $id)
        {
            //print_r($request);die;
            $permission = Permission::find($id);
            $permission->permissionname = $request->input('permissionname');
            //$shift->shifticon =$request->input('shifticon');
            if ($request->hasFile('permissionicon')) {
                $destination = 'uploads/permission/' . $permission->permissionicon;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file = $request->file('permissionicon');
                $extension = $file->getClientOriginalExtension();
                $filename = time() . '.' . $extension;
                $file->move('uploads/permission', $filename);
                $permission->permissionicon = $filename;
            }
            $permission->update();
            return redirect('/permission')->with('status', 'Record upadted succesfully');
        }

        public function deletepermission ($id)
        {

            $permission = Permission::find($id);
            $permission->deletedstatus = "1";
            $permission->update();
            return redirect('/permission')->with('status', 'deleted succesfully');


        }
    }
