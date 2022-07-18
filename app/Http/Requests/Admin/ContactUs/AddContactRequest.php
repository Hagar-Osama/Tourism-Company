<?php

namespace App\Http\Requests\Admin\ContactUs;

use Illuminate\Foundation\Http\FormRequest;

class AddContactRequest extends FormRequest
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
            'name' => 'required|min:3|regex:/^(?!.*\d)[a-z\p{Arabic}\s_ ]+$/iu',
            'phone' => 'required|min:10|regex:/^[0-9]+/',
            'email' => 'required|email|regex:/^.+@.+$/i',
            'subject' => 'required|min:3|regex:/^(?!.*\d)[a-z\p{Arabic}\s_ ]+$/iu',
            'message' => 'required|min:10|regex:/^(?!.*\d)[a-z\p{Arabic}\s_ ]+$/iu'
        ];
    }
}
