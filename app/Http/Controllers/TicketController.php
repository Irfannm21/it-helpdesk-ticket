<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ticket\TicketRequest;
use App\Models\Ticket;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('ticket.index', [
            'title' => "Table Ticket",
            'results' => Ticket::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ticket.create', [
            'title' => "New Ticket",
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TicketRequest $request)
    {
        $record = new Ticket;
        return $record->handleStoreOrUpdate($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        return view('ticket.show', [
            'title' => "Show Ticket",
            'ticket' => $ticket
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ticket $ticket)
    {
        return view('ticket.edit', [
            'title' => "Edit Ticket",
            'ticket' => $ticket
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TicketRequest $request, Ticket $ticket)
    {
        return $ticket->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ticket $ticket)
    {
        return $ticket->handleDestroy();
    }

    public function monitor()
    {
        return view('ticket.monitor', [
            'title' => "Monitoring Ticket",
            'results' => Ticket::where('client_id', Auth::user()->id)->paginate(10),
        ]);
    }

    public function print(Ticket $ticket)
    {

        $pdf = PDF::loadView(
            'ticket.print',
            compact('ticket')
        )
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }
}
