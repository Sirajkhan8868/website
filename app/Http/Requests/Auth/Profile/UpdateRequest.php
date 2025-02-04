<?php

namespace App\Http\Requests\Auth\Profile;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => ['required','string','max:255'],
            'email' => ['required','string','max:255'],
            'password' => ['required', 'min:6', 'max:40', 'confirmed'],
        ];
    }
}
