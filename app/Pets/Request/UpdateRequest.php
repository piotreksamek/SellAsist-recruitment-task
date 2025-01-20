<?php

declare(strict_types=1);

namespace App\Pets\Request;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'category' => 'nullable|integer',
            'name' => 'nullable|string|max:255',
            'photoUrls' => 'required|array|min:1',
            'tags' => 'nullable|array',
            'status' => 'nullable|string|in:available,pending,sold',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
