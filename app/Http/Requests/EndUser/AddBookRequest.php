<?php

namespace App\Http\Requests\EndUser;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
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
            'package_id' => 'required|exists:packages,id',
            'name' => 'required|regex:/^(?!.*\d)[a-z \p{Arabic}\s]+$/iu',
            'phone' => 'required|numeric',
            'email' => 'required|email|regex:/^.+@.+$/i',
            'date' => 'required',
            'message' => 'required'
        ];
    }
}
