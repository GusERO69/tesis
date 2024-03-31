<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:ver-rol|crear-rol|editar-rol|borrar-rol', ['only' => ['index']]);
        $this->middleware('permission:crear-rol', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-rol', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-rol', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        // dd("LLEGO");
        $user = Auth::user();
        $roles = Role::paginate(100);
        $permission = Permission::get();
        $permissions = Permission::get();
        $rolePermissions = [];

        // Verifica si se proporcionó un parámetro de rol en la URL
        $selectedRoleId = $request->input('role_id');

        foreach ($roles as $role) {
            $rolePermissions[$role->id] = DB::table('role_has_permissions')
                ->where('role_has_permissions.role_id', $role->id)
                ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
                ->all();

            $userCount = User::whereHas('roles', function ($query) use ($role) {
                $query->where('role_id', $role->id);
            })->count();

            // Añade el contador a la colección de roles
            $role->userCount = $userCount;

            // Marca el rol seleccionado si coincide con el parámetro de la URL
            $role->isSelected = ($role->id == $selectedRoleId);
        }

        return view('roles.index', compact('roles', 'permission', 'permissions', 'rolePermissions', 'selectedRoleId', 'user'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $permission = Permission::get();
        // return view('roles.crear', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("llego aqui");
        $this->validate($request, [
            'name' => 'required',
            // 'permissions' => 'required|array',
        ]);

        // dd($request->all());
        $role = Role::create(['name' => $request->input('name')]);
        // dd($role->permissions);
        $role->syncPermissions($request->input('permissions'));

        // dd($role->permissions);

        return redirect()->route('roles.index', ['language' => app()->getLocale()]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // dd($id);
        $user = Auth::user();
        $roles = Role::find($id);
        // dd($roles);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        $userCount = User::whereHas('roles', function ($query) use ($roles) {
            $query->where('role_id', $roles->id);
        })->count();

        $usersWithRole = User::whereHas('roles', function ($query) use ($roles) {
            $query->where('roles.id', $roles->id);
        })->get();

        // dd($usersWithRole);

        $roles->userCount = $userCount;

        return view('roles.ver', compact('user', 'roles', 'rolePermissions', 'permission', 'usersWithRole'));
    }

    public function edit(string $id)
    {
        $user = Auth::user();
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table('role_has_permissions')->where('role_has_permissions.role_id', $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();

        return view('roles.editar', compact('role', 'permission', 'rolePermissions', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            // 'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();

        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles.index', ['language' => app()->getLocale()]);
    }

    // public function update(Request $request, Role $role)
    // {
    //     // dd($role);
    //     // dd("LLEGO AQUI");
    //     $this->validate($request, [
    //         'name' => 'required',
    //         'permission' => 'required',
    //     ]);

    //     // $role = Role::find($id);
    //     $role->name = $request->input('name');
    //     $role->save();

    //     // $role->syncPermissions($request->input('permission'));
    //     return redirect()->route('roles.index');
    // }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($language, string $role)
    {
        DB::table('roles')->where('id', $role)->delete();
        return redirect()->route('roles.index', ['language' => app()->getLocale()]);
    }

    public function view()
    {
        // dd("llego aqui");
    }
}
