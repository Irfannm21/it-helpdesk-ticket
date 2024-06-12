<?php

namespace App\Http\Requests\Workplan;

use Illuminate\Foundation\Http\FormRequest;

class WorkplanRequest extends FormRequest
{

    public function rules(): array
    {
        return [
            'technician_id' => 'required',
            'started' => 'required',
            'finished' => 'required',
            'description' => 'required',
        ];
    }
}
