<?php

namespace App\Http\Requests\Major;

use Illuminate\Foundation\Http\FormRequest;

class InsertRequest extends FormRequest
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
            'title' => ['required', 'max:100'],
            'subtitle' => ['required', 'max:150'],
            'description' => ['required'],
            'image' => ['required', 'image', 'mimes:jpg,png,jpeg'],
        ];
    }
}
