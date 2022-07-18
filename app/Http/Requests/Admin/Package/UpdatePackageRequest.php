<?php

namespace App\Http\Requests\Admin\Package;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageRequest extends FormRequest
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
            'title' => 'required',
            'price' => 'required|numeric',
            'plan_pdf' => 'file|mimes:pdf',
            'image' => 'file:image|mimes:png,jpg,jpeg,webp',
            'start_date' => 'required|date',
            'body' => 'required',
            'location' => 'required',
            'category_id' => 'required|exists:categories,id'

        ];
    }
}
