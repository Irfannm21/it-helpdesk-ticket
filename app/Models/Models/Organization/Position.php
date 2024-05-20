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
    
}
