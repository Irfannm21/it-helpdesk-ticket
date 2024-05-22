<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Master\PositionRequest;
use App\Models\Models\Organization\Position;
use App\Models\Models\Organization\StrukturOrganization;
use Illuminate\Http\Request;

class PositionController extends Controller
{
       /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('position.index',[
            "title" => "Table Position",
            "results" => Position::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('position.create',[
            "title" => "New Position",
            'parents' => StrukturOrganization::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PositionRequest $request)
    {
        $record = new Position;
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
    public function edit(Position $position)
    {
        return view('position.edit',[
            "title" => "Edit Position",
            'position' => $position,
            'parents' => StrukturOrganization::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PositionRequest $request, Position $position)
    {
        return $position->handleStoreOrUpdate($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Position $position)
    {
        return $position->handleDestroy();
    }
}
