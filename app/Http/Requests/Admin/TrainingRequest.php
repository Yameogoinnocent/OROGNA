<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TrainingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:180',
            'excerpt' => 'required|string|max:500',
            'description' => 'nullable|string',
            'duration' => 'nullable|string|max:80',
            'location' => 'nullable|string|max:120',
            'price' => 'nullable|string|max:80',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date',
            'image' => 'nullable|string|max:255',
            'image_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
        ];
    }
}
