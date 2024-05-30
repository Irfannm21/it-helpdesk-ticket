<?php

namespace App\Http\Controllers;

use App\Models\Workplan;
use App\User;
use Illuminate\Http\Request;

class WorkplanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('workplan.index',[
            'title' => 'Table Workplan',
            "results" => Workplan::latest()->paginate(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Workplan $workplan)
    {
        return view('workplan.show',[
            'title' => 'Show Workplan',
            "workplan" => $workplan,
            "results" => User::get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Workplan $workplan)
    {
        return view('workplan.edit',[
            'title' => 'Create Workplan',
            "workplan" => $workplan,
            "results" => User::get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Workplan $workplan)
    {
        return $workplan->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
