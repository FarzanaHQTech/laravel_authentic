<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $roles = Role::paginate(2);
        $roles = Role::all();
        return view('backend.roles.roles', compact('roles'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.roles.create'); // Corrected path
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|min:4"
        ]);

        $role = new Role();
        $role->name = $request->name;

        if ($role->save()) {
            return redirect('role')->with('success', "Role created successfully");
        } else {
            return $php_errormsg;
        }
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
    public function edit(string $id)
    {
        //
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
