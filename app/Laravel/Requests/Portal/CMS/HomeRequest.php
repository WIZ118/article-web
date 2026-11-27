<?php

namespace App\Laravel\Requests\Portal\CMS;

use App\Laravel\Requests\RequestManager;

class HomeRequest extends RequestManager
{
    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'badge_text' => 'nullable|string|max:100',
            'primary_button_label' => 'nullable|string|max:80',
            'secondary_button_label' => 'nullable|string|max:80',
            'featured_label' => 'nullable|string|max:80',
            'featured_title' => 'nullable|string|max:120',
            'featured_link_label' => 'nullable|string|max:100',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Page title is required.',
            'content.required' => 'Page content is required.',
            'badge_text.max' => 'The badge text may not be greater than 100 characters.',
            'primary_button_label.max' => 'The primary button label may not be greater than 80 characters.',
            'secondary_button_label.max' => 'The secondary button label may not be greater than 80 characters.',
            'featured_label.max' => 'The featured label may not be greater than 80 characters.',
            'featured_title.max' => 'The featured title may not be greater than 120 characters.',
            'featured_link_label.max' => 'The featured link label may not be greater than 100 characters.',
        ];
    }
}
