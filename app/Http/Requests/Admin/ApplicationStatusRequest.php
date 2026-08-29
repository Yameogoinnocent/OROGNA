<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ApplicationStatusRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->isAdmin() ?? false;
    }

    public function rules(): array
    {
        return [
            'status' => 'required|in:nouvelle,en_etude,entretien,retenue,rejetee',
            'admin_notes' => 'nullable|string|max:10000',
        ];
    }
}
