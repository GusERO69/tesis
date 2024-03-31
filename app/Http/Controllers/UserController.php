<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware('permission:ver-usuario|crear-usuario|editar-usuario|borrar-usuario|ver-dashboard', ['only' => ['index']]);
        $this->middleware('permission:crear-usuario', ['only' => ['create', 'store']]);
        $this->middleware('permission:editar-usuario', ['only' => ['edit', 'update']]);
        $this->middleware('permission:borrar-usuario', ['only' => ['destroy']]);
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $usuarios = User::orderBy('created_at', 'DESC')->get();
        $roles = Role::pluck('name', 'name')->all();
        // dd($roles);

        return view('usuarios.index', compact('usuarios', 'roles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     $roles = Role::pluck('name', 'name')->all();
    //     return view('usuarios.crear', compact('roles'));
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd("llego aqui");
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'roles' => 'required',
        ]);

        $input = $request->all();

        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'imagen/';
            $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUsuario);
            $input['image'] = "$imagenUsuario";
        }
        // dd($input);
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('usuarios.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($usuario)
    {
        $user = User::find($usuario);
        //dd($user);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('usuarios.editar', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'password' => 'string',
            'roles' => 'required',
        ]);

        $input = $request->all();
        //dd($input);
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'imagen/';
            $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUsuario);
            $input['image'] = "$imagenUsuario";
        } else {
            unset($input['image']);
        }
        // dd($input);

        $user = User::find($id);
        $user->update($input);
        DB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($usuario)
    {
        $user = User::find($usuario);
        $user->delete();
        return redirect()->route('usuarios.index');
    }

    public function profile()
    {
        // dd("LLEGO AQUI");
        $user = Auth::user();
        $role = Role::pluck('name', 'name')->all();
        return view('usuarios.perfil', compact('user', 'role'));
    }

    public function dashboard()
    {
        // dd("llego aqui");
        $user = Auth::user();
        return view('usuarios.dashboard', compact('user'));
    }

    public function updateP(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'lastname' => 'required',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }
        if ($imagen = $request->file('image')) {
            $rutaGuardarImg = 'imagen/';
            $imagenUsuario = date('YmdHis') . "." . $imagen->getClientOriginalExtension();
            $imagen->move($rutaGuardarImg, $imagenUsuario);
            $input['image'] = "$imagenUsuario";
        } else {
            unset($input['image']);
        }

        $user->update($input);
        return view('usuarios.perfil', compact('user'));
    }
}
