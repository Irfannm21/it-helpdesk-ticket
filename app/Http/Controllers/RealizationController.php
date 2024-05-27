<?php

namespace App\Http\Controllers;

use App\Models\Realization;
use Illuminate\Http\Request;

class RealizationController extends Controller
{

    public function index()
    {
        return view('realization.index',[
            'title' => "Realization Table",
            'results' => Realization::paginate(10),
        ]);
    }

    public function detail(Realization $realization)
    {
        return view('realization.detail',
        [
            'title' => "Ticket Info",
            'title_2' => "Instruction Info",
            "title_3" => "Realization",
            'realization' => $realization, 
            "results" => Realization::where('workplan_id', $realization->workplan_id)->whereNotNull('product_id')->get(),
        ]);
    }


    public function create(Realization $realization)
    {
        return view('realization.create',
        [
            'title' => "Add Realization",
            'realization'=> $realization
        ]);
    }

    public function store(Request $request)
    {
        return $this->handleStoreOrUpdate($request->all());
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Realization $realization)
    {
        return view('realization.detail',[
            'title' => "Ticket Info",
            'title_2' => "Instruction Info",
            "title_3" => "Realization",
            'realization' => $realization, 
            "results" => Realization::where('workplan_id', $realization->workplan_id)->whereNotNull('product_id')->get(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

}
