<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->text('answer');
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['is_active', 'sort_order']);
        });

        $now = now();

        DB::table('faqs')->insert(array_map(
            fn (array $faq): array => $faq + ['created_at' => $now, 'updated_at' => $now],
            [
                [
                    'question' => 'How can I start a project with Tecknoz?',
                    'answer' => 'Starting a project with us is simple. Just reach out through our contact form or email, and share a brief about your needs. We’ll schedule a call to understand your goals, discuss the scope, and recommend the right approach tailored to your product or brand.',
                    'sort_order' => 1,
                ],
                [
                    'question' => 'What makes Tecknoz different from other agencies?',
                    'answer' => 'At Tecknoz, our team blends creativity, client-driven strategies, and industry expertise to deliver exceptional Software development solutions. We specialize in User Experience Design, App Design & Development, and Web Design & Development, SaaS Development, Ecommerce Development, AI Automation, Agentic AI, always maintaining a high standard of quality. Through a collaborative approach, we ensure our work align with your objectives, fostering growth and success for your brand. Our distinct process sets us apart from the competition.',
                    'sort_order' => 2,
                ],
                [
                    'question' => 'Is Tecknoz a start-up-friendly agency?',
                    'answer' => 'Tecknoz is an agency that caters to start-ups, offering affordable and flexible design solutions tailored to your budget and requirements. We understand the unique challenges start-ups face and are dedicated to helping you build a strong brand and a user-friendly digital presence from the ground up.',
                    'sort_order' => 3,
                ],
                [
                    'question' => 'What development tools and technologies do we use to stay ahead in Software Development?',
                    'answer' => 'We leverage advanced technologies such as Figma, Webflow, Shopify, React/Next, PHP/Node.js, AWS, Docker, and AI tools like TensorFlow, alongside agile methodologies, to deliver scalable, efficient, and innovative software solutions.',
                    'sort_order' => 4,
                ],
                [
                    'question' => 'How do we handle project scope changes or unexpected challenges during the development process?',
                    'answer' => 'Using Agile methodologies, we adapt quickly to scope changes and unforeseen challenges, ensuring transparent communication, flexibility, and continued focus on quality throughout the project.',
                    'sort_order' => 5,
                ],
            ],
        ));
    }

    public function down(): void
    {
        Schema::dropIfExists('faqs');
    }
};
