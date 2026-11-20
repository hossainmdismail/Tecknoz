<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('global_settings', function (Blueprint $table) {
            $table->json('contact_locations')->nullable();
            $table->json('contact_channels')->nullable();
            $table->string('business_hours')->nullable();
        });

        DB::table('global_settings')->eachById(function (object $settings): void {
            $locations = collect(config('contact.locations'));
            $channels = collect(config('contact.channels'));
            $legacyValues = [
                'phone' => $settings->contact_phone,
                'whatsapp' => $settings->whatsapp_number,
                'email' => $settings->contact_email,
            ];

            $channels = $channels->map(function (array $channel) use ($legacyValues, $settings): array {
                $type = $channel['type'];

                if (filled($legacyValues[$type] ?? null)) {
                    $channel['value'] = $legacyValues[$type];
                }

                if ($type === 'messenger' && filled($settings->facebook_url)) {
                    $channel['url'] = $settings->facebook_url;
                }

                return $channel;
            });

            if (filled($settings->address) || filled($settings->map_url) || filled($settings->map_embed_code)) {
                $match = $locations->search(fn (array $location): bool => filled($settings->address)
                    && in_array(trim($settings->address), [$location['label'], $location['address'] ?? null], true));
                $location = $match === false
                    ? ['label' => str((string) $settings->address)->squish()->limit(150)->value() ?: 'Office']
                    : $locations->pull($match);

                $locations->prepend(array_filter([
                    'address' => $settings->address,
                    'map_url' => $settings->map_url,
                    'map_embed_code' => $settings->map_embed_code,
                ], fn (?string $value): bool => filled($value)) + $location);
            }

            DB::table('global_settings')->where('id', $settings->id)->update([
                'contact_locations' => $locations->values()->toJson(JSON_THROW_ON_ERROR),
                'contact_channels' => $channels->values()->toJson(JSON_THROW_ON_ERROR),
                'business_hours' => config('contact.business_hours'),
            ]);
        });
    }

    public function down(): void
    {
        Schema::table('global_settings', function (Blueprint $table) {
            $table->dropColumn(['contact_locations', 'contact_channels', 'business_hours']);
        });
    }
};
