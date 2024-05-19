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
}
