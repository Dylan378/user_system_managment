<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'email' => 'required|string',
            'occupation' => 'nullable|string',
            'country' => 'nullable|string',
            'user_photo' => 'nullable|image',
            'password' => 'nullable|string',
        ];
    }
}
