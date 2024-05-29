<?php

namespace App\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RealizationDetail extends Model
{
    protected $table = "trans_realization_detail";

    protected $fillable = [
        'realization_id',
        'product_id',
        'started',
        'finished',
        'description'
    ];

    protected $casts = [
        'started' => 'datetime',
        'finished' => 'datetime'
    ];

    public function realization()
    {
        return $this->belongsTo(Realization::class,'realization_id');
    }

    public function product() {
        return $this->belongsTo(Product::class, 'product_id');
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
                return redirect()->route('realization.detail',$this->realization->id)->with('message', 'Realization added successfully!');
            } else {
                return redirect()->route('realization.detail',$this->realization->id)->with('message', 'Realization Upddated successfully!');
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
            return redirect()->route('realization.detail',$this->realization->id)->with('message', 'Delete Product successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }
}
