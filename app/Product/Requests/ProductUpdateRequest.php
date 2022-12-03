<?php

namespace App\Product\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'price' => 'integer',
        ];
    }
}
