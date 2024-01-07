<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserSettingsRequest extends FormRequest
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
            'settings.name' => 'required|max:255',
            'settings.surname' => 'required|max:255',
            'settings.website_link' => 'nullable|max:255',
            'settings.github_link' => 'nullable|max:255',
            'settings.youtube_link' => 'nullable|max:255',
            'settings.instagram_link' => 'nullable|max:255',
            'settings.facebook_link' => 'nullable|max:255',
            'settings.phone_number' => 'nullable|regex:/^[0-9]{9,15}$/',
            'settings.address' => 'nullable|regex:/^[A-Za-z0-9\s\-\,\.\']+$/|max:255',
            'settings.about' => 'nullable|max:1000'
        ];
    }
}
