<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function register(Request $request)
    {
        try {

            // Lógica de registro
            $user = new User();
            $user->name = $request->name;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            // dd($request->all());
            // dd("Llego al controlador");

            $user->save();
            // dd("Llego al controlador");

            $roleId = DB::table('roles')->where('name', 'Supervisor')->value('id');

            // Asignar el rol por defecto
            $user->roles()->attach($roleId);
            return redirect(route('login'));
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if ($user->hasRole('Super Admin')) {
                return redirect()->route('home.index');
            } else {
                return redirect()->route('home.index');
            }
            // elseif ($user->hasRole('Socio')) {
            //     return redirect()->route('dashboard', ['language' => app()->getLocale()]);
            // } elseif ($user->hasRole('No socio')) {
            //     return redirect()->route('dashboard', ['language' => app()->getLocale()]);
            // } elseif ($user->hasRole('Super Admin')) {
            //     return redirect()->route('dashboard', ['language' => app()->getLocale()]);
            // }
        } else {
            return redirect()->route('home.index');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('login'));
    }
}
