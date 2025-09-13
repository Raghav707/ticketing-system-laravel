<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;


class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->is_admin) {
            // If the user is an admin, fetch all tickets
            $tickets = Ticket::latest()->get();
        } else {
            // If they are a regular user, fetch only their own tickets
            $tickets = auth()->user()->tickets()->latest()->get();
        }

        return view('tickets.index', compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Create the new ticket
        $request->user()->tickets()->create($request->all());

        // Redirect back to the list with a success message
        return redirect('/tickets')->with('success', 'Ticket created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show', ['ticket' => $ticket]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('tickets.edit', ['ticket' => $ticket]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ticket $ticket)
    {
        // Validate the data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        // Update the ticket
        $ticket->update($request->all());

        // Redirect back to the ticket's page with a success message
        return redirect('/tickets/' . $ticket->id)->with('success', 'Ticket updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect('/tickets')->with('success', 'Ticket deleted successfully!');
    }
}
