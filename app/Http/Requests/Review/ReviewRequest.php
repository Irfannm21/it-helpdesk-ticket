<?php

namespace App\Http\Requests\Review;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
 
    public function rules(): array
    {
        return [
            'date' => 'required',
            'description' => 'required'
        ];
    }
}
