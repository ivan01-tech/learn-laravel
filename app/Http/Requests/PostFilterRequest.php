<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Str;

class PostFilterRequest extends FormRequest
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
            "title" => "required|string|min:6|regex:/^[a-zA-Z.-_]+/",
            "content" => "required",
            "slug" => "required",
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            "slug" => $this->input("slug") ? $this->input("slug") : Str::slug($this->input("title"))
        ]);
    }
}
