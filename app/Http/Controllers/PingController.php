<?php

namespace App\Http\Controllers;

use App\Models\Ping;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PingController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $pings = Ping::all();
        return view('ping.index', compact('pings', 'user'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'ip_address' => 'required',
        ]);

        $input = $request->all();

        $ping = Ping::create($input);

        return redirect()->route('ping.index');
    }

    public function ping(Request $request, Ping $ping)
    {
        // dd("llego");
        $ip = $ping->ip_address;
        $pingResult = shell_exec("ping -n 4 $ip");

        if (strpos($pingResult, 'TTL=') !== false) {
            $ping->is_alive = true;
        } else {
            $ping->is_alive = false;
        }
        $ping->save();

        return redirect()->route('ping.index');
    }

    public function destroy($idPing)
    {
        $ping = Ping::find($idPing);
        $ping->delete();
        return redirect()->route('ping.index');
    }
}
