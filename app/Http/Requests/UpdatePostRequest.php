<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePostRequest extends FormRequest 
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|max:255",
            "body" => "required|string|max:1000|min:3",
            "user_id" => "required|exists:users,id",
            "photo" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048",
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'The title is required.',
            'body.required' => 'The body is required.',
            'body.min' => 'The body must be at least 3 characters.',
        ];
    }
}
