<?php

namespace App\Http\Requests\Admin\Package;

use Illuminate\Foundation\Http\FormRequest;

class AddPackageRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric',
            'plan_pdf' => 'required|file|mimes:pdf',
            'image' => 'required|file:image|mimes:png,jpg,jpeg,webp',
            'start_date' => 'required|date',
            'body' => 'required',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id'
        ];
    }
}
