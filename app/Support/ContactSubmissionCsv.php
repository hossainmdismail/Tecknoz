<?php

namespace App\Support;

use Illuminate\Database\Eloquent\Builder;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ContactSubmissionCsv
{
    public static function download(Builder $query, string $filename): StreamedResponse
    {
        return response()->streamDownload(static function () use ($query): void {
            $output = fopen('php://output', 'wb');

            try {
                fwrite($output, "\xEF\xBB\xBF");
                fputcsv($output, ['ID', 'Submitted at (UTC)', 'Name', 'Email', 'Phone', 'Budget', 'Subject', 'Message', 'Status', 'Internal notes'], escape: '');

                foreach ($query->cursor() as $submission) {
                    $values = [
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
                    ];

                    fputcsv($output, array_map(self::escapeCell(...), $values), escape: '');
                }
            } finally {
                fclose($output);
            }
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Cache-Control' => 'private, no-store',
        ]);
    }

    private static function escapeCell(?string $value): string
    {
        $value ??= '';

        // Keep spreadsheet software from evaluating submission text as a formula.
        return preg_match('/^(?:[\t\r\n]|\s*[=+\-@＝＋－＠])/u', $value) ? "'".$value : $value;
    }
}
