<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(): View
    {
        return view('frontend.pages.projects.index', [
            'projects' => Project::query()->published()->latest('published_at')->latest('id')->simplePaginate(12),
        ]);
    }

    public function show(string $slug): View
    {
        return view('frontend.pages.projects.show', [
            'project' => Project::query()->published()->where('slug', $slug)->firstOrFail(),
        ]);
    }
}
