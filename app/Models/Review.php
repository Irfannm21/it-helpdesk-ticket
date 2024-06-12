<?php

namespace App\Models;

use App\Models\Model;
use App\Models\Realization;
use App\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    protected $table = 'trans_review';

    protected $fillable = [
        'realization_id',
        'user_id',
        'date',
        'description'
    ];

    protected $casts = 
    [
        "date" => 'date'
    ];

    public function client() {
        return $this->belongsTo(User::class,'technician_id');
    }

    public function realization() {
        return $this->belongsTo(Realization::class,'realization_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            if($request->action == "submit") {
                $this->fill($request->all());
                $this->status = "Completed";
                $this->save();
            } else {
                $this->fill($request->all());
                $this->status = "Draft";
                $this->save();
            }
          
            $this->commitSaved();
                return redirect()->route('review.index',$this->id)->with('message', 'Feedback Upddated successfully!');
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
