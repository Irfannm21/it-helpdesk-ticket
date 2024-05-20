<?php

namespace App\Models\Models\Organization;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StrukturOrganization extends Model
{
    protected $table = 'ref_struktur_organization';

    protected $fillable = [
        'code',
        'name',
        'type',
        'address',
        'phone',
        'email',
        'parent_id'
    ];

    public function parent() {
        return $this->belongsTo(StrukturOrganization::class, 'parent_id');
    }

    public function positions() {
        return $this->hasMany(Position::class, 'org_id');
    }

    public function handleStoreOrUpdate($request)
    {
        $this->beginTransaction();
        try {
            $this->fill($request->all());
            $this->type = "director";
            $this->save();

            // return $this->commitSaved();
            $this->commitSaved();
            return redirect()->route('director.index')->with('message', 'User added successfully!');
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
            return redirect()->route('director.index')->with('message', 'Delete Product successfully!');
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }
}
