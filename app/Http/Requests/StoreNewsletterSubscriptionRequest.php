<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreNewsletterSubscriptionRequest extends FormRequest
{
    protected $errorBag = 'newsletter';

    public function rules(): array
    {
        return ['newsletter_email' => ['required', 'email:rfc', 'max:255']];
    }

    public function attributes(): array
    {
        return ['newsletter_email' => 'email address'];
    }

    public function getRedirectUrl(): string
    {
        $previous = $this->headers->get('referer') ?? $this->session()->previousUrl();

        if (! is_string($previous) || ! str_starts_with($previous, $this->getSchemeAndHttpHost().'/')) {
            $previous = route('home');
        }

        return Str::before($previous, '#').'#newsletter-form';
    }
}
