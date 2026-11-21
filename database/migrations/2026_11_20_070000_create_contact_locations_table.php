<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        $savedLocations = DB::table('global_settings')->where('id', 1)->value('contact_locations');
        $locations = $savedLocations === null
            ? config('contact.locations')
            : json_decode($savedLocations, true, flags: JSON_THROW_ON_ERROR);

        Schema::create('contact_locations', function (Blueprint $table) {
            $table->id();
            $table->string('label', 150);
            $table->string('office_name', 150)->nullable();
            $table->text('address')->nullable();
            $table->text('map_url')->nullable();
            $table->longText('map_embed_code')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['is_active', 'sort_order']);
        });

        $timestamp = now();
        foreach (array_values($locations ?? []) as $position => $location) {
            DB::table('contact_locations')->insert([
                'label' => $location['label'],
                'office_name' => $location['office_name'] ?? null,
                'address' => $location['address'] ?? null,
                'map_url' => $location['map_url'] ?? null,
                'map_embed_code' => $location['map_embed_code'] ?? null,
                'sort_order' => $position,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ]);
        }

        Schema::table('global_settings', function (Blueprint $table) {
            $table->dropColumn('contact_locations');
        });
    }

    public function down(): void
    {
        Schema::table('global_settings', function (Blueprint $table) {
            $table->json('contact_locations')->nullable();
        });

        $locations = DB::table('contact_locations')
            ->orderBy('sort_order')
            ->orderBy('id')
            ->get(['label', 'office_name', 'address', 'map_url', 'map_embed_code']);

        DB::table('global_settings')->where('id', 1)->update([
            'contact_locations' => $locations->toJson(JSON_THROW_ON_ERROR),
        ]);

        Schema::dropIfExists('contact_locations');
    }
};
