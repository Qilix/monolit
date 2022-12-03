<?php

namespace App\Category\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
{

    public function rules()
    {
        return [
            'name' => 'string|max:255',
            'parent_id' => 'integer|nullable',
        ];
    }
}
