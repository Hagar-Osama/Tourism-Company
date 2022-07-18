<?php

namespace App\Http\Requests\Admin\Assets;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAssetRequest extends FormRequest
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
            'assets_id' =>'required|exists:assets,id',
        ];
    }
}
