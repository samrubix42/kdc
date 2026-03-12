<?php

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;

new class extends Component {
    public Blog $blog;

    public function mount(string $slug): void
    {
        $this->blog = Blog::with('category')
            ->where('is_active', true)
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function with(): array
    {
        return [
            'recentPosts' => Blog::where('is_active', true)
                ->where('id', '!=', $this->blog->id)
                ->latest()
                ->take(5)
                ->get(),
            'categories' => BlogCategory::where('is_active', true)
                ->withCount(['blogs' => fn ($q) => $q->where('is_active', true)])
                ->orderBy('name')
                ->get(),
            'tags' => collect(explode(',', (string) $this->blog->tags))
                ->map(fn ($tag) => trim($tag))
                ->filter()
                ->values(),
        ];
    }
};
?>

<div>
  <div class="header-space">
      <div class="post-video">
        <div class="container">
          <div class="embed-responsive embed-responsive-16by9">
            @if($blog->image)
              <img src="{{ Storage::url($blog->image) }}" alt="{{ $blog->title }}" class="embed-responsive-item" style="object-fit:cover;">
            @else
              <img src="{{ asset('images/news/1-1170x572.jpg') }}" alt="{{ $blog->title }}" class="embed-responsive-item" style="object-fit:cover;">
            @endif
          </div>
        </div>
      </div>
    </div>

    <div class="page-content-2">
      <div class="container">
        <div class="row">
          <div class="primary col-md-8">
            <article class="post">
              <h1 class="entry-title">{{ $blog->title }}</h1>
              <div class="posted-on">
                <a class="url fn n" href="#">Admin</a>
                on {{ $blog->created_at?->format('M jS, Y') }}
              </div>
              <div class="entry-content">
                @if($blog->description)
                  <h3 class="entry-description">{{ $blog->description }}</h3>
                @endif

                {!! $blog->content !!}
              </div>
              <div class="entry-footer">
                <div class="tags-links">
                  <span>Tags:</span>
                  @forelse($tags as $tag)
                    <a href="#">{{ $tag }}</a>@if(!$loop->last),@endif
                  @empty
                    <a href="#">General</a>
                  @endforelse
                </div>
                <div class="post-share">
                  <span>Share:</span>
                  <a href="" class="icon ion-social-facebook"></a>
                  <a href="" class="icon ion-social-twitter"></a>
                  <a href="" class="icon ion-social-pinterest"></a>
                </div>
              </div>
            </article>
          </div>
          <div class="secondary col-md-4">
            <div class="widget sidebar_widget widget_search">
              <h3 class="widget-title">Search</h3>
              <form class="search-form" action="{{ route('blog') }}" method="get">
                  <input type="search" class="search-field" placeholder="Search ..." value="" name="s" title="Search for:">
                  <button type="submit" class="fa fa-search search-submit"></button>
              </form>
            </div>

            <div class="widget sidebar_widget widget_recent_posts">
              <h3 class="widget-title">Recent posts</h3>
              <ul>
                @forelse($recentPosts as $recent)
                <li>
                 <a href="{{ route('blog.detail', $recent->slug) }}" class="recent-post-thumbnail">
                  <img alt="{{ $recent->title }}" src="{{ $recent->image ? Storage::url($recent->image) : asset('images/news/1-79x64.jpg') }}">
                 </a>
                  <div class="recent-post-content">
                     <a href="{{ route('blog.detail', $recent->slug) }}" class="post-title">{{ $recent->title }}</a>
                     <span class="post-time">{{ $recent->created_at?->format('M jS, Y') }}</span>
                  </div>
                </li>
                @empty
                <li>
                  <div class="recent-post-content">
                     <span class="post-title">No recent posts</span>
                  </div>
                </li>
                @endforelse
              </ul>
            </div>
            <div class="widget sidebar_widget widget_categories">
              <h3 class="widget-title">Categories</h3>
              <ul>
                @forelse($categories as $category)
                <li>
                 <a href="{{ route('blog') }}">{{ $category->name }}</a>
                 ({{ $category->blogs_count }})
                </li>
                @empty
                <li>
                  <a href="#">General</a>
                  (0)
                </li>
                @endforelse
              </ul>
            </div>
          </div>
        </div>
      </div>

    </div>
</div>
