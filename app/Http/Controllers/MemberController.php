<?php

namespace App\Http\Controllers;

use App\Member;
use App\Customer;
use App\MemberMain;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        $members = Member::orderBy('created_at', 'DESC')->with('customer')->get();
        return view('members.index', compact('customers', 'members'));
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
        $member = new Member();
        $member->customer_id = $request->get('cust');
        $member->available_at = $request->get('date');
        $member->description = $request->get('desc');
        $member->price_free = '-';

        $member->save();
        return redirect()->route('members.index')->withSuccess('Member Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = Member::findOrFail($id);
        $memberMains = MemberMain::where('member_id', $id)->get();
        return view('members.show', compact('member', 'memberMains'));
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
        $members = Member::orderBy('created_at', 'DESC')->with('customer')->get();
        $update = Member::findOrFail($id);

        return view('members.edit', compact('customers', 'members', 'update'));
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
        $member = Member::findOrFail($id);
        $member->customer_id = $request->get('cust');
        $member->available_at = $request->get('date');
        $member->description = $request->get('desc');

        $member->save();
        return redirect()->route('members.index')->withSuccess('Member Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);
        $memberMains = MemberMain::where('member_id', $member->id);
        $memberMains->delete();
        $member->delete();

        return redirect()->route('members.index')->withSuccess('Member Berhasil dihapus!');
    }

    public function addMainMember(Request $request)
    {
        $memberMain = new MemberMain();
        $memberMain->member_id = $request->get('memberId');
        $memberMain->date = $request->get('date');
        $memberMain->description = $request->get('desc');
        $memberMain->save();
        return redirect()->back()->withSuccess('Data Main Berhasil ditambahkan!');
    }

    public function deleteMainMember($id)
    {
        $member = MemberMain::findOrFail($id);
        $member->delete();

        return redirect()->back()->withSuccess('Member Berhasil dihapus!');
    }

    public function finishedMember($id)
    {
        $member = Member::findOrFail($id);
        $member->status = 'finished';
        $member->save();

        return redirect()->back()->withSuccess('Member Berhasil diselesaikan!');
    }
}
