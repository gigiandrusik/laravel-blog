<?php
/**
 * Created by PhpStorm.
 * User: andrusik
 * Date: 12/10/17
 * Time: 12:03 AM
 */

namespace App\Http\Requests;

use Illuminate\Support\Facades\Request as BaseRequest;

/**
 * Class PostRequest
 * @package App\Http\Requests
 */
class PostRequest extends Request
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
        $file = BaseRequest::route('post') ? 'nullable' : 'required';

        return [
            'category_id' => 'required|numeric',
            'name'        => 'required|string|max:255',
            'content'     => 'required|string',
            'file'        => "$file|image|mimes:png,jpg,jpeg|max:2048"
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return array_merge(parent::messages(), [
            'category_id.required' => 'The category is required.',
        ]);
    }
}