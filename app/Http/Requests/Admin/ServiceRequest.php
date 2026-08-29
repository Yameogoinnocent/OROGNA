<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:180',
            'short_description' => 'required|string|max:500',
            'description' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'accent' => 'required|in:green,orange',
            'sort_order' => 'required|integer|min:0',
            'is_active' => 'nullable',
        ];
    }
}
