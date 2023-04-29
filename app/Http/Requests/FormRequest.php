<?php 

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormRequests extends FormRequest
{
    public function Authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'The name field is required',
            'name.min' => 'The name field Requires at least :min characters',
            'email.required' => 'The email field is required'
        ];
    }
}