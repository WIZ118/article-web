<?php

namespace App\Laravel\Requests\Portal\CMS;

use App\Laravel\Requests\RequestManager;

class ArticleRequest extends RequestManager
{
    public function rules()
    {
        return [
            'name' => "required|between:2,30|regex:/^[A-Za-z0-9'-. \s]+$/",
            'description' => 'required|string|min:2',
            'image' => 'nullable|mimetypes:image/jpeg,image/jpg,image/png,image/pjpeg|max:5000',
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Field is required.',
            'name.regex' => 'Invalid article title.',
            'name.between' => 'Article title should be between 2 to 30 characters only.',
            'image.mimetypes' => 'The article image must be a JPEG or PNG file.',
            'image.max' => 'Maximum image size is 5MB.',
        ];
    }
}
