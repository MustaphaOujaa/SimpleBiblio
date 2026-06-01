<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'designation' => ['required', 'string', 'max:255'],
            'auteur' => ['required', 'string', 'max:255'],
            'prix' => ['required', 'numeric', 'min:0'],
            'type' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'cover' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
        ];
    }
}
