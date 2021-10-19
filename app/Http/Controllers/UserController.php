<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'email.unique' => 'Email sudah digunakan!'
        ];

        $request->validate([
            'email' => 'required|string|unique:users',
            'password' => 'required|string'
        ], $messages);

        $user = new User;

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        $user->password = \Hash::make($request->get('password'));
        $user->save();

        return redirect()->route('users.index')->withSuccess('User Berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
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
        $messages = [
            'photo.mimes' => 'Photo hanya gambar jpeg, jpg atau png'
        ];

        $request->validate([
            'name' => 'required|string|max:60',
            'photo' => 'nullable|mimes:jpg,png,jpeg'

        ], $messages);

        $user = User::findOrFail($id);
        $photo = $user->avatar;
        if ($request->file('photo')) {
            if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
                \Storage::delete('public/' . $user->avatar);
            }
            $photo = $request->file('photo')->store('users', 'public');
        }

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->role = $request->get('role');
        if ($request->password) {
            $user->password = \Hash::make($request->get('password'));
        }
        $user->avatar = $photo;
        $user->save();

        return redirect()->route('users.index')->withSuccess('User Berhasil diedit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user->avatar && file_exists(storage_path('app/public/' . $user->avatar))) {
            \Storage::delete('public/' . $user->avatar);
        }
        $user->delete();
        return redirect()->route('users.index')->withSuccess('User Berhasil dihapus!');
    }

    public function AuthRouteAPI(Request $request)
    {
        return $request->user();
    }
}
