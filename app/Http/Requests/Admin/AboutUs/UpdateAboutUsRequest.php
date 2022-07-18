<?php

namespace App\Http\Requests\Admin\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAboutUsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'about_id' => 'required|exists:about_us,id',
            'slug' => 'required|min:3|regex:/^(?!.*\d)[a-z\p{Arabic}\s_ ]+$/iu',
            'image' => 'mimes:png,jpg,jpeg,webp',
            'body' => 'required'
        ];
    }
}
