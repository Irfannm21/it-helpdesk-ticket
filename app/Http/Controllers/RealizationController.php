<?php

namespace App\Http\Controllers;

use App\Models\Realization;
use Illuminate\Http\Request;

class RealizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('realization.index',[
            'title' => "Realization Table",
            'results' => Realization::paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('realization.create',
        [
            'title' => "Add Realization",
        ]);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Realization $realization)
    {
        return view('realization.detail',[
            'title' => "Ticket Info",
            'title_2' => "Instruction Info",
            "title_3" => "Realization",
            'realization' => $realization, 
            "results" => Realization::where('workplan_id', $realization->workplan_id)->get(),
        ]);
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
