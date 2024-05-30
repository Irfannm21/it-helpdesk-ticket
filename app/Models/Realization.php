<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Review;
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

    public function details()
    {
        return $this->hasMany(RealizationDetail::class, 'realization_id');
    }

    public function user() {
        return $this->belongsTo(User::class,'technician_id');
    }

    public function review()
    {
        return $this->hasOne(Review::class, 'realization_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            if($request->action == "submit") {
                $this->status = "completed";
                $this->save();
            } else {
                $this->started = $request->date ." ". $request->started . ":00";
                $this->finished = $request->date ." ". $request->finished . ":00";
                // $this->status = "draft";
                $this->save();
            }
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

    public function handleSubmit($request)
    {
        if($this->details->isNotEmpty() == false) {
            return redirect()->route('realization.detail',$this->id)->with('message', 'Cant Submit Fill Realization!');
        }
        $this->beginTransaction();
        if($request->action == "submit") {
            $this->status = "completed";
            $this->save();
            $review = Review::firstOrNew([
                'realization_id' => $this->id,
                'user_id'   => $this->workplan->ticket->client_id,
                'status' => "New",
            ]);
            $review->save();
        } else {
            $this->status = "Draft";
            $this->save();
        }
        try {
           
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
