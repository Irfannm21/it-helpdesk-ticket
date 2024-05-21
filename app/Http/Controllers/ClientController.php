<?php

namespace App\Http\Controllers;

use App\Http\Requests\Master\ClientRequest;
use App\Models\Models\Organization\Position;
use App\Models\Product;
use App\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('client.index',[
           "title" => "Table Client",
           "results" => User::paginate(10)->whereNotNull('code'), 
        ]);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('client.create', [
            'title' => 'New Client',
            'users' => User::paginate(10),
            "pc" => Product::where('types','PC')->get(),
            "printer" => Product::where('types','Printer')->get(),
            "network" => Product::where('types','Network')->get(),  
            "so" => Position::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientRequest $request)
    {
        $record = new User;
        return $record->handleStoreOrUpdate($request);
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
    public function edit(User $client)
    {
        return view('client.edit', [
            'title' => 'Edit Client',
            'client' => $client,
            "pc" => Product::where('types','PC')->get(),
            "printer" => Product::where('types','Printer')->get(),
            "network" => Product::where('types','Network')->get(),
            "so" => Position::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientRequest $request, User $client)
    {
        return $client->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $client)
    {
        return $client->handleDestroy();
    }
}
