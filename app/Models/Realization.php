<?php

namespace App\Models;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Realization extends Model
{
    protected $table = 'trans_realization';

    protected $fillable = [
        'workplan_id',
        'product_id',
        'date',
        'started',
        'finished',
        'problem_description',
        'status',
    ];

    public function workplan() {
        return $this->belongsTo(Workplan::class, 'workplan_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $this->save();

            // return $this->commitSaved();
            $this->commitSaved();
            if(request()->route()->getName() == 'realization.store') {
                return redirect()->route('realization.index')->with('message', 'Product added successfully!');
            } else {
                return redirect()->route('realization.index')->with('message', 'Product Upddated successfully!');
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
