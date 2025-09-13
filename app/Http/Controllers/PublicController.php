<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    /**
     * Show the public support form.
     */
    public function create()
    {
        return view('support');
    }

    /**
     * Store a new ticket from the public form.
     */
    public function store(Request $request)
    {
        // Validate the incoming data
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Create the ticket, setting a default status
        Ticket::create([
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => 'Open', // Always set new public tickets to 'Open'
        ]);

        return redirect()->route('support.create')
            ->with('success', 'Your ticket has been submitted successfully! We will contact you shortly.');
    }
}
