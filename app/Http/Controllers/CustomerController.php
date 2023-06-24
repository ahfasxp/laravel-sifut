<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Member;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'unique:customers',
        ]);

        $customer = new Customer;
        $customer->name = $request->get('name');
        $customer->address = $request->get('address');
        $customer->phone = $request->get('phone');
        $customer->status = $request->get('status');
        $customer->save();

        if ($request->from == 'customers.index') {
            return redirect()->route('customers.index')->withSuccess('Tim Berhasil ditambahkan!');
        } else {
            return redirect()->route('orders.create')->withSuccess('Tim Berhasil ditambahkan!');
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
    public function edit($id)
    {
        $customers = Customer::all();
        $update = Customer::findOrFail($id);

        return view('customers.edit', compact('customers', 'update'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'unique:customers,name,' . $id,
        ]);

        $customer = Customer::findOrFail($id);

        $customer->name = $request->get('name');
        $customer->address = $request->get('address');
        $customer->phone = $request->get('phone');
        $customer->status = $request->get('status');
        $customer->save();

        try {
            $member = Member::where('customer_id', $id)->get()->last();
            if ($member) {
                $getStatus = $member->customer->status;
                switch ($getStatus) {
                case 'UMUM':
                    $priceFree = '80.000';
                    break;
                case 'SMA':
                    $priceFree = '70.000';
                    break;
                case 'SMP':
                    $priceFree = '60.000';
                    break;
                case 'SD':
                    $priceFree = '50.000';
                    break;
                default:
                    break;
                }

                $member->price_free = $priceFree;
                $member->save();
            }
        } catch (\Throwable $th) {
            return back()->with('msg', 'Status tim ' . $member->customer->name . ' belum diisi, Mohon edit dimanage tim');
        }

       
        return redirect()->route('customers.index')->withSuccess('Tim Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->withSuccess('Tim Berhasil dihapus!');
    }
}
