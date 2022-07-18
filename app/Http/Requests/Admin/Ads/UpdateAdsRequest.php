<?php

namespace App\Http\Requests\Admin\Ads;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAdsRequest extends FormRequest
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
            'ad_id' => 'required|exists:ads,id',
            'link' => 'required|url',
            'image' => 'file:image|mimes:png,jpg,jpeg,webp'
        ];
    }
}
