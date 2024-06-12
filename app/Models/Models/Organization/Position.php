<?php

namespace App\Models\Models\Organization;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Position extends Model
{
    protected $table = "ref_position";

    protected $fillable = [
        'name',
        'org_id'
    ];

    public function organization()
    {
        return $this->belongsTo(StrukturOrganization::class, 'org_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $this->save();
            $this->commitSaved();
            if(request()->route()->getName() == 'position.store') {
                return redirect()->route('position.index')->with('message', 'Position added successfully!');
            } else {
                return redirect()->route('position.index')->with('message', 'Position Upddated successfully!');
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
            return redirect()->route('position.index')->with('message', 'Delete Position successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }
    
}
