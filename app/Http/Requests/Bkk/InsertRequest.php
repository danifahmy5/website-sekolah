<?php

namespace App\Http\Requests\Bkk;

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
            'instance' => ['required'],
            'industrial_sector' => ['required'],
            'addr' => ['required'],
            'whatsapp' => ['numeric'],
            'email' => ['email'],
            'image' => ['image', 'mimes:jpg,jpeg,png']
        ];
    }
}
