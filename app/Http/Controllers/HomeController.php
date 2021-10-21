<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Member;
use App\MemberMain;
use Illuminate\Http\Request;
use App\Order;

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

    public function index(Request $request)
    {
        $schedules = Order::orderBy('created_at', 'ASC')->with('category', 'customer')->where('status', 'schedule')->get();

        if ($request->get('member') != null) {
            $customer = Customer::where('name', $request->get('member'))->first();
            if ($customer) {
                $member = Member::where('customer_id', $customer->id)->first();
                $memberMains = MemberMain::where('member_id', $member->id)->get();

                return view('welcome', compact('schedules', 'member', 'memberMains'));
            }
        }
        return view('welcome', compact('schedules'));
    }
}
