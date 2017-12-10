<?php

namespace App\Http\Requests;

/**
 * Class CommentRequest
 * @package App\Http\Requests
 */
class CommentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'author'  => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }
}