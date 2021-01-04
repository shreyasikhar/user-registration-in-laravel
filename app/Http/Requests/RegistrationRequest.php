<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'name'      => ['required', 'min:3'],
            'email'     => ['required', 'string', 'email'],
            'password'  => ['required', 'string', 'min:6'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required',
            'name.min' => 'Name should be atleast 3 chars',
            'email.required' => 'Email is required',
            'email.email' => 'Valid email is required',
            'email.string' => 'Valid email is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password should be atleast 6 chars',
        ];
    }
}
