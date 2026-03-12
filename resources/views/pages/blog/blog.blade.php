<?php

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;

new class extends Component {
    public function with(): array
    {
        return [
            'categories' => BlogCategory::where('is_active', true)
                ->whereHas('blogs', fn ($q) => $q->where('is_active', true))
                ->orderBy('name')
                ->get(),
            'blogs' => Blog::with('category')
                ->where('is_active', true)
                ->latest()
                ->get(),
        ];
    }
};
?>

<div>
    <main class="page-header">
      <div class="container"><h1>Latest Thoughts, Ideas & Plans.</h1></div>
    </main>

    <div class="content">
      <div class="projects">
        <div class="container">
          <div class="filter-content-3">
            <ul class="filter js-filter">
              <li class="active"><a href="#" data-filter="*">All</a></li>
              @foreach($categories as $category)
              <li>
                <a href="#" data-filter=".{{ $category->slug }}">{{ $category->name }}</a>
              </li>
              @endforeach
            </ul>
          </div>
          <div class="grid-items js-isotope js-grid-items">
            @forelse($blogs as $blog)
            <div class="grid-item {{ $blog->category?->slug ?: 'general' }} js-isotope-item js-grid-item">
              <div class="news-item">
                <img
                  alt="{{ $blog->title }}"
                  src="{{ $blog->image ? Storage::url($blog->image) : asset('images/news/1-370x370.jpg') }}">
                <div class="news-hover">
                  <div class="hover-border"><div></div></div>
                  <div class="content">
                    <div class="time">{{ $blog->created_at?->format('M jS, Y') }}</div>
                    <h3 class="news-title">{{ $blog->title }}</h3>
                    <p class="news-description">
                      {{ $blog->description ?: Str::limit(strip_tags($blog->content), 120) }}
                    </p>
                  </div>
                  <a class="read-more" href="{{ route('blog.detail', $blog->slug) }}">Continue</a>
                </div>
              </div>
            </div>
            @empty
            <div class="grid-item js-isotope-item js-grid-item">
              <div class="news-item">
                <div class="news-hover" style="position:relative; opacity:1;">
                  <div class="content">
                    <h3 class="news-title">No blog posts found</h3>
                    <p class="news-description">Please check back soon for new articles.</p>
                  </div>
                </div>
              </div>
            </div>
            @endforelse
          </div>
        </div>
      </div>
    </div>
</div>
