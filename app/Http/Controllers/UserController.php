<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {      
        return view("users.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::with(['role'])->findOrFail($id);
        return view('users.show', compact('user'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */public function edit(string $id)
    {
        $user=User::findOrFail($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
          'name'=>'required|max:255',
            'email' =>'required|email',
        ]);
        
        $user= User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $events= Event::get();
        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function adminPanel()
    {
        $events= Event::get();
        $users= User::get();
        return view('users.adminPanel',compact('events', 'users')); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user =User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}
