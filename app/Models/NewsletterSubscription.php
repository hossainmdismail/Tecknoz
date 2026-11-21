<?php

namespace App\Models;

use App\Enums\ContactSubmissionStatus;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscription extends Model
{
    protected $fillable = ['email', 'status', 'internal_notes'];

    protected function casts(): array
    {
        return ['status' => ContactSubmissionStatus::class];
    }
}
