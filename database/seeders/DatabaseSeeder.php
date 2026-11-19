<?php

namespace Database\Seeders;

use App\Models\GlobalSetting;
use App\Models\MarketingSettings;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        GlobalSetting::currentOrCreate();
        MarketingSettings::currentOrCreate();
    }
}
