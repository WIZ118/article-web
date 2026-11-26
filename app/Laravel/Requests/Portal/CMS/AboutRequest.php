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
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Page title is required.',
            'content.required' => 'Page content is required.',
        ];
    }
}
