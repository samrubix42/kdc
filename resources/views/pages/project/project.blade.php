<?php

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

new class extends Component {
  public function with()
  {
    $projects = Project::with(['category', 'images' => function ($query) {
      $query->orderByDesc('is_primary')->orderBy('id');
    }])->latest()->get();

    return [
      'projects' => $projects,
      'categories' => $projects->pluck('category')->filter()->unique('id')->values(),
    ];
  }
};
?>
@section('meta_title', 'Projects | KDC Consultants Portfolio')
@section('meta_description', 'Browse KDC Consultants project portfolio across residential, commercial, hospitality, and interior architecture categories.')
@section('meta_keywords', 'KDC projects, architecture portfolio, interior projects, commercial architecture, residential projects')

<div>
  @php
    $resolveImageUrl = static function (?string $path, string $fallback) {
      if (blank($path)) {
        return asset($fallback);
      }

      if (Str::startsWith($path, ['http://', 'https://', '//'])) {
        return $path;
      }

      if (Str::startsWith($path, ['images/', '/images/'])) {
        return asset(ltrim($path, '/'));
      }

      return Storage::url($path);
    };
  @endphp

  <main class="page-header">
    <div class="container">
      <h1>Architecture Is A Visual Art And The Building Speak For Themeselves</h1>
    </div>
  </main>

  <div class="content">
    <div class="projects">
      <div class="container">
        <div class="filter-content-2">
          <ul class="filter js-filter">
            <li class="active"><a href="#" data-filter="*">All</a></li>
            @foreach($categories as $category)
              <li><a href="#" data-filter=".{{ Str::slug($category->slug ?: $category->name) }}">{{ $category->name }}</a></li>
            @endforeach
          </ul>
        </div>
      </div>
      <div class="grid-items js-isotope js-grid-items">
        @forelse($projects as $project)
          @php
            $cover = $project->images->firstWhere('is_primary', true) ?? $project->images->first();
            $categoryClass = Str::slug($project->category?->slug ?: $project->category?->name ?: 'project');
          @endphp
          <div class="grid-item {{ $categoryClass }} js-isotope-item js-grid-item">
            <div class="project-item item-shadow">
              <img alt="{{ $project->title }}" class="img-responsive" src="{{ $resolveImageUrl($cover?->image_path, 'images/projects/1-426x574.jpg') }}">
              <div class="project-hover">
                <div class="project-hover-content">
                  <h3 class="project-title">{{ $project->title }}</h3>
                  <p class="project-description">{{ Str::limit(strip_tags($project->description), 170) }}</p>
                </div>
              </div>
              <a href="{{ route('project.detail', $project->slug) }}" class="link-arrow">See project <i class="icon ion-ios-arrow-right"></i></a>
            </div>
          </div>
        @empty
          <div class="grid-item js-isotope-item js-grid-item">
            <div class="project-item item-shadow" style="padding:30px;">
              <h3 class="project-title">No projects available</h3>
              <p class="project-description">Please add projects from Admin Panel.</p>
            </div>
          </div>
        @endforelse
      </div>
    </div>
  </div>
</div>
