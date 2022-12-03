<?php

namespace App\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'parent_id' => 'integer',
        ];
    }
}
