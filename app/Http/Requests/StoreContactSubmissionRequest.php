<?php

namespace App\Http\Requests;

use App\Models\ContactSubmission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactSubmissionRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email:rfc', 'max:255'],
            'phone' => ['required', 'string', 'max:50', 'regex:/^\+?[0-9][0-9 ().-]{5,48}$/'],
            'budget' => ['required', 'string', Rule::in(array_keys(ContactSubmission::BUDGET_OPTIONS))],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:5000'],
        ];
    }

    protected function getRedirectUrl(): string
    {
        return route('contact').'#contact-form';
    }
}
