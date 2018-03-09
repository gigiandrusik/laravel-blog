<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;

/**
 * Class CategoryRequest
 *
 * @package App\Http\Requests
 */
class CategoryRequest extends Request
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'        => [
                'required', 'string',
                Rule::unique('categories', 'name')->ignore($this->get('id'))
            ],
            'description' => 'required|string',
        ];
    }
}