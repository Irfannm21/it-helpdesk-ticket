<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\DirectorRequest;
use App\Http\Requests\Master\SoRequest;
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
            "title" => "Table Department",
            "results" => StrukturOrganization::where('type',"department")->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('department.create',[
            "title" => "New Department",
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
    public function edit(StrukturOrganization $department)
    {
        return view('department.edit',[
            "title" => "Edit Department",
            'department' => $department,
            'parents' => StrukturOrganization::where('type','department')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SoRequest $request, StrukturOrganization $department)
    {
        return $department->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganization $department)
    {
        return $department->handleDestroy();
    }
}
