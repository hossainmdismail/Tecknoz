<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsletterSubscriptionRequest;
use App\Models\NewsletterSubscription;
use Illuminate\Http\RedirectResponse;

class NewsletterSubscriptionController extends Controller
{
    public function __invoke(StoreNewsletterSubscriptionRequest $request): RedirectResponse
    {
        NewsletterSubscription::query()->createOrFirst([
            'email' => mb_strtolower($request->validated('newsletter_email')),
        ]);

        return redirect()->to($request->getRedirectUrl(), 303)->with('newsletter_subscribed', true);
    }
}
