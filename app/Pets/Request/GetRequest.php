<?php

declare(strict_types=1);

namespace App\Pets\Request;

use Illuminate\Foundation\Http\FormRequest;

class GetRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'petId' => 'required|integer',
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
