<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'settings' => 'nullable|array',
            'logo_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:12288',
            'favicon_upload' => 'nullable|image|mimes:jpg,jpeg,png,webp,ico|max:4096',
        ];
    }
}
