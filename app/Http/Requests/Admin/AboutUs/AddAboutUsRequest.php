<?php

namespace App\Http\Requests\Admin\AboutUs;

use Illuminate\Foundation\Http\FormRequest;

class AddAboutUsRequest extends FormRequest
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
            'slug' => 'required|min:3',
            'image' => 'required|file:image|mimes:png,jpg,jpeg,webp',
            'body' => 'required'
        ];
    }
}
