<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class SoRequest extends FormRequest
{

    public function rules(): array
    {
        if(!empty($this->director->id)) {
            $id = $this->director->id;    
        } elseif(!empty($this->department->id)) {
            $id = $this->department->id;    
        } elseif(!empty($this->division->id)) {
            $id = $this->division->id;    
        } else {
            $id = 0;
        }

        $rules =  [
            "code" => 'required|unique:ref_struktur_organization,code,'.$id.',id',
            'name' => 'required',
            "parent_id" => 'required'
        ];

        return $rules;
    }
}
