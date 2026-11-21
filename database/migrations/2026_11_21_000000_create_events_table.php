<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title', 150);
            $table->string('date_label', 100)->nullable();
            $table->text('summary');
            $table->text('url')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(false);
            $table->timestamps();
            $table->index(['is_active', 'sort_order']);
        });

        // These years and milestones come from the existing About page.
        $milestones = [
            ['2025', 'Expansion into AI and semiconductor engineering', 'Tecknoz added AI and semiconductor engineering to its areas of work.'],
            ['2024', 'Collaboration with government bodies', 'Tecknoz began working with public-sector organisations on infrastructure and development.'],
            ['2023', 'Expanded service offerings', 'Tecknoz broadened its service portfolio across technology and talent.'],
            ['2022', 'International client partnerships', 'Tecknoz began partnering with overseas clients.'],
            ['2021', 'Tecknoz founded', 'Tecknoz was established to provide technology and business solutions.'],
        ];

        $timestamp = now();
        $rows = [];
        foreach ($milestones as $index => [$year, $title, $summary]) {
            $rows[] = [
                'title' => $title,
                'date_label' => $year,
                'summary' => $summary,
                'sort_order' => ($index + 1) * 10,
                'is_active' => true,
                'created_at' => $timestamp,
                'updated_at' => $timestamp,
            ];
        }

        DB::table('events')->insert($rows);
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
