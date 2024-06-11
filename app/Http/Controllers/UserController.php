<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::latest()->get();

        return Inertia::render("Admin/Users/Index",[
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //      

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "name" => ['required','string'],
            "email" => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:8'],
        ]);

        $user = User::create([
            "name" => $request->name,
            "email" => $request->email,
            "role" => $request->role,
            "password" => Hash::make($request->password),
        ]);

        return response()->json([
            'message' => 'user created successfully',
            'user' => $user
        ]);        
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([
            "name" => ['required','string'],
            "email" => ['required','email','unique:users,email'],
            'password' => ['required','confirmed','min:8'],
            'role' => ['string','exist:roles,name'],
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make( $request->password);
        $user->role = $request->role;
        $user->update();

        return response()->json([
            'message' => 'user updated successfully',
            'user' => $user
        ]);    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
        $user->delete();
        return response()->json([
            'message' => 'user deleted successfully',
            'user' => $user
        ]);    
    }
}
