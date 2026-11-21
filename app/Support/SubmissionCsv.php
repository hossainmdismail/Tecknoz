<?php

namespace App\Support;

use Symfony\Component\HttpFoundation\StreamedResponse;

class SubmissionCsv
{
    public static function download(string $filename, array $headers, iterable $rows): StreamedResponse
    {
        return response()->streamDownload(static function () use ($headers, $rows): void {
            $output = fopen('php://output', 'wb');

            try {
                fwrite($output, "\xEF\xBB\xBF");
                fputcsv($output, $headers, escape: '');

                foreach ($rows as $row) {
                    fputcsv($output, array_map(self::escapeCell(...), $row), escape: '');
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
