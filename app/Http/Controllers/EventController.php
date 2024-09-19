<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $events= Event::get();
        return view('event.index',compact('events'));  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('event.create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availableTickets' => 'required|integer',
            'date' => 'required|date',
            'description' => 'required|string'
        ]);

        $event= Event::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'availableTickets'=>$request->availableTickets,
            'date'=>$request->date,
            'description'=>$request->description,
        ]);
        return redirect()->route('events.index')->with('success', 'Event added successfully');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event=Event::findOrFail($id);
        return view('event.show',compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event=Event::findOrFail($id);
        return view('event.edit',compact('event','id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'availableTickets' => 'required|integer',
            'date' => 'required|date',
            'description' => 'required|string'
          ]);
          
          $event= Event::findOrFail($id);
          $event->name = $request->name;
          $event->description= $request->description;
          $event->price = $request->price;
          $event->availableTickets = $request->availableTickets;
          $event->date = $request->date;
          $event->save();
          return redirect()->route('events.index')->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(string $id)
    {
        $event = Event::findOrFail($id);
        $event->delete();
        return redirect()->route('events.index')->with('success', 'User deleted successfully');
    }
}
