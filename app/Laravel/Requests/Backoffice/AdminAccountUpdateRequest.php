<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;
use Override;

class AdminAccountUpdateRequest extends RequestManager
{
    public function rules()
    {
        $rules = [
            'full_name' => 'nullable|string|max:255',
            'email' => "nullable|email|unique:admin,email",
            'password' => 'nullable|string|min:8|confirmed',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is optional.',
            'name.unique' => 'This name is already registered.',
            'email.required' => 'Email address is optional.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
            'password.required' => 'Password is optional.',
            'password.min' => 'Password must be at least 8 characters long.',
            'password.confirmed' => 'Password does not match.',
        ];
    }
}
