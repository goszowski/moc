<?php

namespace App\Http\Requests\Auth;

use App\Http\Requests\BaseRequest;

class RegisterRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules() : array
    {
        return [
            'lastname' => [
                'required',
                'string',
                'between:2,100',
            ],

            'firstname' => [
                'required',
                'string',
                'between:2,100',
            ],

            'patronymic' => [
                'required',
                'string',
                'between:2,100',
            ],

            'phone' => [
                'required',
                'unique:customers',
                'phone:UA',
            ],

            'password' => [
                'required',
                'string',
                'confirmed',
                'min:6',
            ],
        ];
    }
}
