<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'address' => 'required'
        ];
    }
}
