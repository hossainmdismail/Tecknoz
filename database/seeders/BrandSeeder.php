<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class BrandSeeder extends Seeder
{
    public function run(): void
    {
        $disk = Storage::disk('public');

        foreach ([
            'LLU_1LLU.avif',
            'informedSO.svg',
            'ghorerbazar.webp',
            'liquidTrees_1liquidTrees.avif',
            'wrench-logo-2.jpg',
            'meditriangle.png',
            'nirvar.png',
            'Meta-DEsign-solutions-logo-mds.svg',
            'TestGorilla.svg',
            'ecomdigital_1ecomdigital.avif',
            'Levilane_1Levilane.avif',
            'devop1.svg',
            'mobil-bangladesh.svg',
            'Longwin---logo.png',
            'WechatIMG31432.jpg',
            'NBR-logo.png',
            'paraform.png',
            'Caspia_Logo-black.svg',
            'download-1.jpg',
            'Best-Electronics-PNG.png',
            'download-copy.png',
            'DEER-Chair---Nasir-Group-Logo.webp',
            'dhaka-mass-transit-company-limited-dmtcl-logo-DA9F1D1088-seeklogo.com.png',
            'cropped-New-logo-300x100-1.webp',
        ] as $filename) {
            $path = 'brands/starter/'.$filename;

            if (! $disk->exists($path) && ! $disk->put($path, file_get_contents(public_path('frontend/images/'.$filename)))) {
                throw new \RuntimeException("Unable to copy brand image [{$filename}].");
            }

            Brand::query()->firstOrCreate(['image' => $path], ['is_active' => true]);
        }
    }
}
