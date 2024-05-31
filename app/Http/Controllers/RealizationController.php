<?php

namespace App\Http\Controllers;

use App\Http\Requests\Realization\RealizationRequest;
use App\Models\Realization;
use App\Models\RealizationDetail;
use App\User;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function store(RealizationRequest $request)
    {
        $record = new RealizationDetail;
        return $record->handleStoreOrUpdate($request);
    }

    public function show(Realization $realization)
    {
        return view('realization.show',
        [
            'title' => "Ticket Info",
            'title_2' => "Instruction Info",
            "title_3" => "Realization",
            'realization' => $realization, 
            "results" => RealizationDetail::where('realization_id', $realization->id)->paginate(10),
        ]);
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

    public function submit(Request $request, Realization $realization)
    {
        return $realization->handleSubmit($request);
    }

    public function print(Realization $realization)
    {
        $pdf = PDF::loadView(
            'realization.print',
            compact('realization')
        )
            ->setPaper('a4', 'landscape');
        return $pdf->stream();
    }

    public function detailEdit(RealizationDetail $realizationDetail)
    {
        
        return view('realization.detail.edit',
        [
            'title' => "Edit Realization",
            'realizationDetail'=> $realizationDetail
        ]);
    }

    public function detailUpdate(Request $request, RealizationDetail $realizationDetail)
    {
        return $realizationDetail->handleStoreOrUpdate($request);
    }

    public function detailDelete(RealizationDetail $realizationDetail)
    {
        return $realizationDetail->handleDestroy();
    }

}
