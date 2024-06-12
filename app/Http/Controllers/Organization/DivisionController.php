<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\SoRequest;
use App\Models\Models\Organization\StrukturOrganization;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
     /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('division.index',[
            "title" => "Table Division",
            "results" => StrukturOrganization::where('type',"division")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('division.create',[
            "title" => "New Division",
            'parents' => StrukturOrganization::where('type','department')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SoRequest $request)
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
    public function edit(StrukturOrganization $division)
    {
        return view('division.edit',[
            "title" => "Edit Division",
            'division' => $division,
            'parents' => StrukturOrganization::where('type','department')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SoRequest $request, StrukturOrganization $division)
    {
        return $division->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganization $division)
    {
        return $division->handleDestroy();
    }
}
