<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Models\Organization\StrukturOrganization;
use Illuminate\Http\Request;

class DeparmentController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('department.index',[
            "title" => "Table Director",
            "results" => StrukturOrganization::where('type',"director")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create',[
            "title" => "New Director",
            'parents' => StrukturOrganization::where('type','director')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $record = new StrukturOrganization;
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
    public function edit(StrukturOrganization $director)
    {
        return view('department.edit',[
            "title" => "Edit Director",
            'director' => $director,
            'parents' => StrukturOrganization::where('type','director')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganization $director)
    {
        return $director->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganization $director)
    {
        return $director->handleDestroy();
    }
}
