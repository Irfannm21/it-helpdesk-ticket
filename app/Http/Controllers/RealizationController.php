<?php

namespace App\Http\Controllers;

use App\Models\Realization;
use App\Models\RealizationDetail;
use App\User;
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
            "results" => RealizationDetail::where('realization_id', $realization->id)->paginate(10),
        ]);
    }


    public function create(Realization $realization)
    {
        return view('realization.detail.create',
        [
            'title' => "Add Realization",
            'realization'=> $realization
        ]);
    }

    public function store(Request $request)
    {
        $record = new RealizationDetail;
        return $record->handleStoreOrUpdate($request);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(Realization $realization)
    {
        return view('realization.edit',[
            'title' => "Ticket Info",
            'title_2' => "Instruction Info",
            "title_3" => "Realization",
            "results" =>    User::get(),
            'realization' => $realization, 
        ]);
    }

    public function update(Request $request, Realization $realization)
    {
        return $realization->handleStoreOrUpdate($request);
    }

    public function destroy(string $id)
    {
        //
    }

    public function detailEdit(RealizationDetail $realizationDetail)
    {
        dd($realizationDetail);
    }

}
