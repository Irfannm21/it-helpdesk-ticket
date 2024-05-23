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
            $this->save();

            $this->commitSaved();
            // dd($this,request()->route());
            switch (request()->route()->getName()) {
                case 'director.store':
                    return redirect()->route('director.index')->with('message', 'Added Director successfully!');
                    break;
                case 'director.update':
                    return redirect()->route('director.index')->with('message', 'Director Updated successfully!');
                    break;
                case 'department.store':
                    return redirect()->route('department.index')->with('message', 'Added Department successfully!');
                    break;
                case 'department.update':
                    return redirect()->route('department.index')->with('message', 'Department Updated successfully!');
                    break;
                case 'division.store':
                    return redirect()->route('division.index')->with('message', 'Added Division successfully!');
                    break;
                case 'division.update':
                    return redirect()->route('division.index')->with('message', 'Division Updated successfully!');
                    break;
                
                default:
                    return redirect()->route('office.index')->with('message', 'Office Updated successfully!');
                    break;
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
            switch (request()->route()->getName()) {
                case 'director.destroy':
                    return redirect()->route('director.index')->with('message', 'Delete Director successfully');
                    break;
                case 'department.destroy':
                    return redirect()->route('department.index')->with('message', 'Delete Department successfully');
                    break;
                default:
                    return redirect()->route('division.index')->with('message', 'Delete Division successfully');
                    break;
                }
        } catch (\Exception $e) {
            return $this->rollbackDeleted($e);
        }
    }
}
