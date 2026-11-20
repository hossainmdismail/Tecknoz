<?php

namespace App\Enums;

use Illuminate\Support\Facades\Storage;

enum ContactChannel: string
{
    case Phone = 'phone';
    case WhatsApp = 'whatsapp';
    case Email = 'email';
    case WeChat = 'wechat';
    case Messenger = 'messenger';

    public function label(): string
    {
        return match ($this) {
            self::Phone => 'Phone',
            self::WhatsApp => 'WhatsApp',
            self::Email => 'Email',
            self::WeChat => 'WeChat',
            self::Messenger => 'Messenger',
        };
    }

    public function href(array $entry): ?string
    {
        $value = $entry['value'];

        return match ($this) {
            self::Phone => 'tel:'.preg_replace('/[^+0-9]/', '', $value),
            self::WhatsApp => 'https://wa.me/'.preg_replace('/[^0-9]/', '', $value),
            self::Email => 'mailto:'.$value,
            self::WeChat => filled($entry['qr_image'] ?? null)
                ? Storage::disk('public')->url($entry['qr_image'])
                : ($entry['url'] ?? null),
            self::Messenger => $entry['url'] ?? null,
        };
    }
}
