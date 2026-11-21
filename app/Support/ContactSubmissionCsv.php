<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactSubmissionCsv
{
    public static function download(Builder $query, string $filename): StreamedResponse
    {
        return SubmissionCsv::download(
            $filename,
            ['ID', 'Submitted at (UTC)', 'Name', 'Email', 'Phone', 'Budget', 'Subject', 'Message', 'Status', 'Internal notes'],
            $query->cursor()->map(fn ($submission): array => [
                $submission->id,
                $submission->created_at->utc()->toIso8601String(),
                $submission->name,
                $submission->email,
                $submission->phone,
                $submission->budget_label,
                $submission->subject,
                $submission->message,
                $submission->status->getLabel(),
                $submission->internal_notes,
            ]),
        );
    }
}
