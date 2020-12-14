<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{

    /**
     * __contruct
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['permission:roles.index|roles.create|roles.edit|roles.delete']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $roles = Role::latest()->when(request()->q, function ($roles) {
            $roles = $roles->where('name', 'like', '%' . request()->q . '%');
        })->paginate(5);;

        return view('admin.role.index', compact('roles'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permission = Permission::latest()->get();

        return view('admin.role.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles'
        ]);

        $role = Role::create([
            'name' => $request->input('name')
        ]);

        // assign permission to role 
        $role->syncPermissions($request->input('permissions'));

        if ($role) {
            # redirect dengan pesan sukses
            return redirect()->route('admin.role.index')->with(['success' => 'Data Berhasil disimpan! ']);
        } else {
            // redirect dengan pesan error
            return redirect()->route('admin.role.index')->with(['success' => 'Data Gagal disimpan! ']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permission =  Permission::latest()->get();
        return view('admin.role.edit', compact('role','permission'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name,'.$role->id
        ]);

        $role = Role::findOrFail($role->id);
        $role->update([
            'name' => $request->input('name')
        ]);

        // assign permission to role 
        $role->syncPermissions($request->input('permissions'));

        if ($role) {
            # redirect dengan pesan sukses
            return redirect()->route('admin.role.index')->with(['success' => 'Data Berhasil di update! ']);
        } else {
            // redirect dengan pesan error
            return redirect()->route('admin.role.index')->with(['success' => 'Data Gagal di update! ']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $permission = $role->permissions;
        $role->revokePermissionTo($permission);
        $role->delete();

        if ($role) {
            return response()->json([
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'status' => 'error'
            ]);
        }
    }
}
