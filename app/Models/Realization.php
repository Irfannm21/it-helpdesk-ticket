<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Workplan;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realization extends Model
{
    protected $table = 'trans_realization';

    protected $fillable = [
        'workplan_id',
        'technician_id',
        'date',
        'started',
        'finished',
        'description',
        'status',
    ];

    protected $casts = [
        'date' => 'date',
        'started' => 'datetime',
        'finished' => 'datetime'
    ];

    public function workplan() {
        return $this->belongsTo(Workplan::class, 'workplan_id');
    }

   

    public function user() {
        return $this->belongsTo(User::class,'technician_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
                $this->started = $request->date ." ". $request->started . ":00";
                $this->finished = $request->date ." ". $request->finished . ":00";
                $this->save();
            $this->commitSaved();
              if(request()->route()->getName() == 'realization.store') {
                return redirect()->route('realization.index',$this->id)->with('message', 'Realization added successfully!');
            } else {
                return redirect()->route('realization.index',$this->id)->with('message', 'Realization Upddated successfully!');
            }
        } catch (\Exception $e) {
            return $this->rollbackSaved($e);
        }

    }

    // public function handleStoreOrUpdate($request)
    // {
    //     // dd($request->all());
    //     $this->beginTransaction();
    //     try {
    //         $this->fill($request->all());
    //         $this->save();

    //         // return $this->commitSaved();
    //         $this->commitSaved();
    //         if(request()->route()->getName() == 'realization.store') {
    //             return redirect()->route('realization.detail',$this->id)->with('message', 'Product added successfully!');
    //         } else {
    //             return redirect()->route('realization.detail',$this->id)->with('message', 'Product Upddated successfully!');
    //         }
    //     } catch (\Exception $e) {
    //         return $this->rollbackSaved($e);
    //     }
    // }

    public function handleDestroy()
    {
        $this->beginTransaction();
        try {
            $this->delete();
            $this->commitDeleted();
            return redirect()->route('realization.index')->with('message', 'Delete Product successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }
}
