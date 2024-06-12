<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    public function rules(): array
    {
        $id = $this->product->id ?? 0;

        return [
            'code' => 'required|min:3|max:13|unique:ref_product,code,'.$id.',id',
            'name' => 'required|min:1|max:200|',
            'date' => 'required',
            'types' => 'required',
            'price' => 'required',
        ];
    }
}
