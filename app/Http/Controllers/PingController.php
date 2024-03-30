<?php

namespace App\Http\Controllers;

use App\Models\Ping;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Http\Request;

class PingController extends Controller
{
    public function index()
    {
        // dd("LLEGO");
        $pings = Ping::all();
        return view('ping.index', compact('pings'));
    }
    public function ping(Request $request, Ping $ping)
    {
        $ip = $ping->ip_address;
        $pingResult = shell_exec("ping -n 4 $ip");
        // dd($pingResult);
        // dd($pingResult);
        // $llego = !empty ($pingResult);
        // $ping->is_alive = strpos($pingResult, '0%') !== false;
        // $true = strpos($pingResult, 'TTL=');
        // dd($true);
        // $ping->save();
        // dd($llego);


        if (strpos($pingResult, 'TTL=') !== false) {
            $ping->is_alive = true;
        } else {
            $ping->is_alive = false;
        }
        $ping->save();

        return redirect()->route('ping.index');
    }


}
