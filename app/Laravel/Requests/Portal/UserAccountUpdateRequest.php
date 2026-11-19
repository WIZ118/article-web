<?php

namespace App\Laravel\Requests\Portal;

use App\Laravel\Requests\RequestManager;
use Override;

class UserAccountUpdateRequest extends RequestManager
{
    public function rules()
    {
        $rules = [
            'full_name' => 'nullable|string|max:255',
            'email_address' => "nullable|email|unique:admin,email_address",
            'user_password' => 'nullable|string|min:8|confirmed',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'full_name.required' => 'Name is optional.',
            'full_name.unique' => 'This name is already registered.',
            'email_address.required' => 'Email address is optional.',
            'email_address.email' => 'Please provide a valid email address.',
            'email_address.unique' => 'This email is already registered.',
            'user_password.required' => 'Password is optional.',
            'user_password.min' => 'Password must be at least 8 characters long.',
            'user_password.confirmed' => 'Password does not match.',
        ];
    }
}
