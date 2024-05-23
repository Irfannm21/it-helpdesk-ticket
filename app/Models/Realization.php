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
}
