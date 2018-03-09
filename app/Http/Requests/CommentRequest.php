<?php

namespace App\Http\Requests;

/**
 * Class CommentRequest
 *
 * @package App\Http\Requests
 */
class CommentRequest extends Request
{
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