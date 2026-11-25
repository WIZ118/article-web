<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class UserAccountUpdateRequest extends RequestManager
{
    public function rules()
    {
        $id = $this->route('id');

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $id,
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Name is required.',
            'email.required' => 'Email address is required.',
            'email.email' => 'Please provide a valid email address.',
            'email.unique' => 'This email is already registered.',
        ];
    }
}
