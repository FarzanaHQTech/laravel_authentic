<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

use function Ramsey\Uuid\v1;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.user', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:4",
            "email" => "required|email",
            "password" => "required|min:5",
            "photo" => "required|image|mimes:jpg,jpeg,png,webp|max:2048",
            "role" => "required"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role;
        $user->password = Hash::make($request->password);
        $photoName = $request->name . "." . $request->file('photo')->extension();
        $request->file('photo')->move(public_path('image'), $photoName);
        // $photoName = $request->name . "." . $request->file('photo')->extension();
        // $request->file('photo')->move(public_path('image'),$photoName);
        $user->photo = $photoName;
        if ($user->save()) {
            return redirect('user')->with('success', "created successfully");
        } else {
            return back()->withErrors(['msg' => 'somthing went wrong']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);

        if ($user) {
            return view('backend.users.show', compact('user'));
        } else {
            return redirect('user')->withErrors(['msg' => 'User not found']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        return view('backend.users.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
