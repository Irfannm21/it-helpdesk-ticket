<?php

namespace App\Models;

use App\Models\Model;
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

    public function user() {
        return $this->belongsTo(User::class,'technician_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
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
