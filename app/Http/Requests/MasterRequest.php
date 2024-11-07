<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MasterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'specialization' => 'required|string',
        ];
    }
}
