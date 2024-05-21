<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{

    public function rules(): array
    {
        $id = $this->client->id ?? 0;

        return [
            "code" => 'required|unique:users,code,'.$id.',id',
            "name" => 'required',
            "username" => 'required',
            "email" => 'required|unique:users,email,'.$id.',id',
            "password" => 'required',
            "position_id" => 'required',
            "pc_id" => 'required',
        ];
    }
}
