<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum ContactSubmissionStatus: string implements HasColor, HasLabel
{
    case New = 'new';
    case InProgress = 'in_progress';
    case Resolved = 'resolved';

    public function getLabel(): string
    {
        return match ($this) {
            self::New => 'New',
            self::InProgress => 'In progress',
            self::Resolved => 'Resolved',
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::New => 'info',
            self::InProgress => 'warning',
            self::Resolved => 'success',
        };
    }
}
