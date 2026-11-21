<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreContactSubmissionRequest;
use App\Models\ContactLocation;
use App\Models\ContactSubmission;
use App\Support\FrontendSeo;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactController extends Controller
{
    public function show(FrontendSeo $frontendSeo): View
    {
        return view('frontend.pages.contact', [
            'budgetOptions' => ContactSubmission::BUDGET_OPTIONS,
            'contactLocations' => ContactLocation::query()->visible()->get(),
            'settings' => $frontendSeo->globalSettings(),
        ]);
    }

    public function store(StoreContactSubmissionRequest $request): RedirectResponse
    {
        ContactSubmission::query()->create($request->validated());

        return redirect()->route('contact', [], 303)
            ->withFragment('contact-form')
            ->with('contact_submitted', true);
    }
}
