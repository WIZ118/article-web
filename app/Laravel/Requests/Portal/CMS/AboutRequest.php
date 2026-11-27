<?php

namespace App\Laravel\Requests\Portal\CMS;

use App\Laravel\Requests\RequestManager;

class AboutRequest extends RequestManager
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'section_label' => 'nullable|string|max:100',
            'mission_title' => 'nullable|string|max:120',
            'mission_content' => 'nullable|string|max:10000',
            'vision_title' => 'nullable|string|max:120',
            'vision_content' => 'nullable|string|max:10000',
            'contact_button_label' => 'nullable|string|max:80',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Page title is required.',
            'content.required' => 'Page content is required.',
            'section_label.max' => 'The section label may not be greater than 100 characters.',
            'mission_title.max' => 'The mission title may not be greater than 120 characters.',
            'mission_content.max' => 'The mission content may not be greater than 10000 characters.',
            'vision_title.max' => 'The vision title may not be greater than 120 characters.',
            'vision_content.max' => 'The vision content may not be greater than 10000 characters.',
            'contact_button_label.max' => 'The contact button label may not be greater than 80 characters.',
        ];
    }
}
