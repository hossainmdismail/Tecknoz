<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 191)->unique();
            $table->text('summary')->nullable();
            $table->longText('details')->nullable();
            $table->string('image')->nullable();
            $table->string('client')->nullable();
            $table->string('client_logo')->nullable();
            $table->longText('services_rendered')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('color', 7)->nullable();
            $table->date('deadline')->nullable();
            $table->string('industry')->nullable();
            $table->timestamp('published_at')->nullable()->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
