<?php

namespace App\Laravel\Requests\Portal;

use App\Laravel\Requests\RequestManager;
use Override;

class UserAccountRequest extends RequestManager
{
    public function rules()
    {
        $rules = [
            'full_name' => 'required|string|max:255',
            'email_address' => "required|email|unique:admin,email_address",
            'user_password' => 'required|string|min:8|confirmed',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Name is required.',
            'full_name.unique' => 'This name is already registered.',
            'email_address.required' => 'Email address is required.',
            'email_address.email' => 'Please provide a valid email address.',
            'email_address.unique' => 'This email is already registered.',
            'user_password.required' => 'Password is required.',
            'user_password.min' => 'Password must be at least 8 characters long.',
            'user_password.confirmed' => 'Password does not match.',
        ];
    }
}
