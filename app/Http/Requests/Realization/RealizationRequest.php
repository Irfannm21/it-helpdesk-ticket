<?php

namespace App\Http\Requests\Realization;

use Illuminate\Foundation\Http\FormRequest;

class RealizationRequest extends FormRequest
{

    public function rules(): array
    {
        // $id = $this->product->id ?? 0;

        return [
            'product_id' => 'required',
            'started' => 'required',
            'finished' => 'required',
            'description' => 'required',
        ];
    }
}
