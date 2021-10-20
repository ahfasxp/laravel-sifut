<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    // /**
    //  * Create a new controller instance.
    //  *
    //  * @return void
    //  */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function home()
    {
        $harga = \App\Category::count();
        $tim = \App\Customer::count();
        $jadwal = \App\Order::where('status', 'schedule')->count();
        $selesai = \App\Order::where('status', 'success')->count();
        return view('home', compact('harga', 'tim', 'jadwal', 'selesai'));
    }

    public function index()
    {
        return view('welcome');
    }
}
