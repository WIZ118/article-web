<?php

namespace App\Laravel\Requests\Portal\CMS;

use App\Laravel\Requests\RequestManager;

class ContactRequest extends RequestManager
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'section_label' => 'nullable|string|max:100',
            'email' => 'nullable|email|max:255',
            'phone' => 'nullable|string|max:50',
            'office' => 'nullable|string|max:255',
            'support_badge' => 'nullable|string|max:100',
            'support_title' => 'nullable|string|max:120',
            'support_content' => 'nullable|string|max:1500',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Page title is required.',
            'content.required' => 'Page content is required.',
            'section_label.max' => 'The section label may not be greater than 100 characters.',
            'email.email' => 'Enter a valid contact email address.',
            'email.max' => 'The email address may not be greater than 255 characters.',
            'phone.max' => 'The phone number may not be greater than 50 characters.',
            'office.max' => 'The office location may not be greater than 255 characters.',
            'support_badge.max' => 'The support badge may not be greater than 100 characters.',
            'support_title.max' => 'The support title may not be greater than 120 characters.',
            'support_content.max' => 'The support content may not be greater than 1500 characters.',
        ];
    }
}
