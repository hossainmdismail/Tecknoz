<?php

namespace App\Models;

use App\Enums\ContactSubmissionStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class ContactSubmission extends Model
{
    public const BUDGET_OPTIONS = [
        'under-2k' => 'Less than $2k',
        '2k-5k' => '$2k – $5k',
        '5k-10k' => '$5k – $10k',
        '10k-20k' => '$10k – $20k',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'budget',
        'subject',
        'message',
        'status',
        'internal_notes',
    ];

    protected function casts(): array
    {
        return ['status' => ContactSubmissionStatus::class];
    }

    protected function budgetLabel(): Attribute
    {
        return Attribute::get(fn (): string => self::BUDGET_OPTIONS[$this->budget] ?? $this->budget);
    }
}
