<?php

namespace App\Laravel\Requests\Backoffice;

use App\Laravel\Requests\RequestManager;

class AdminAccountUpdateRequest extends RequestManager
{
    public function rules()
    {
        $id = $this->route('id') ?: auth('admin')->id();

        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admin,email,' . $id,
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
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
