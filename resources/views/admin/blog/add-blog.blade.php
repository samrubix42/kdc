<?php

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {
    use WithFileUploads;

    public $title;
    public $description;
    public $slug;
    public $content;
    public $tags;
    public $category_id;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $image;
    public $is_active = true;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string|max:500',
        'slug' => 'required|string|max:255|unique:blogs,slug',
        'content' => 'required|string',
        'tags' => 'nullable|string|max:500',
        'category_id' => 'required|exists:blog_categories,id',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string',
        'meta_keywords' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'is_active' => 'boolean'
    ];

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $this->validate();

        $imagePath = null;
        if ($this->image) {
            $imagePath = $this->image->store('blogs', 'public');
        }

        Blog::create([
            'title' => $this->title,
            'description' => $this->description,
            'slug' => $this->slug,
            'content' => $this->content,
            'tags' => $this->tags,
            'category_id' => $this->category_id,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'image' => $imagePath,
            'is_active' => $this->is_active
        ]);

        $this->dispatch('toast-show', ['message' => 'Article published!', 'type' => 'success']);
        return redirect()->route('admin.blogs');
    }
};
?>
<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">

    <!-- Header -->

    <div class="flex items-center justify-between mb-6">

        <div>
            <h1 class="text-lg font-semibold text-slate-800">Write Article</h1>
            <p class="text-sm text-slate-500">Create and publish blog content</p>
        </div>

        <a
            href="{{ route('admin.blogs') }}"
            wire:navigate
            class="text-sm text-slate-600 hover:text-slate-900 flex items-center gap-1">

            <i class="ri-arrow-left-line"></i>
            Back

        </a>

    </div>


    <form wire:submit.prevent="save">

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- Main Editor -->

            <div class="lg:col-span-2 space-y-6">

                <!-- Title Card -->

                <div class="bg-white rounded-lg shadow-sm p-6 space-y-4">

                    <div>

                        <label class="text-xs font-medium text-slate-600">
                            Post Title
                        </label>

                        <input
                            wire:model.live="title"
                            type="text"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-lg font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"
                            placeholder="Enter article title">

                        @error('title')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                    </div>


                    <div>

                        <label class="text-xs font-medium text-slate-600">
                            Slug
                        </label>

                        <div class="flex items-center mt-1">

                            <span class="text-xs text-slate-400 bg-slate-50 border border-slate-200 px-2 py-2 rounded-l-md">
                                /blog/
                            </span>

                            <input
                                wire:model="slug"
                                type="text"
                                class="flex-1 border border-slate-300 border-l-0 rounded-r-md px-3 py-2 text-sm">

                        </div>

                        @error('slug')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                    <div>

                        <label class="text-xs font-medium text-slate-600">
                            Short Description
                        </label>

                        <textarea
                            wire:model="description"
                            rows="3"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"
                            placeholder="Brief summary for listing and preview"></textarea>

                        @error('description')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                </div>


                <!-- Editor -->

                <div class="bg-white rounded-lg shadow-sm p-6">

                    <label class="text-xs font-medium text-slate-600">
                        Article Content
                    </label>

                    <div wire:ignore class="mt-2">

                        <div
                            x-data="{
content: @entangle('content'),
init() {
tinymce.init({
target: this.$refs.editor,
height: 450,
menubar:false,
plugins:'advlist autolink lists link image preview code fullscreen',
toolbar:'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
setup:(editor)=>{
editor.on('change keyup undo redo',()=>{
this.content = editor.getContent()
})
}
})
}
}">

                            <textarea x-ref="editor"></textarea>

                        </div>

                    </div>

                    @error('content')
                    <p class="text-xs text-red-500 mt-2">{{ $message }}</p>
                    @enderror

                </div>


                <!-- SEO Card -->

                <div class="bg-white rounded-lg shadow-sm p-6 space-y-4">

                    <h3 class="text-sm font-semibold text-slate-700">
                        SEO Settings
                    </h3>

                    <div>

                        <label class="text-xs text-slate-600">
                            Meta Title
                        </label>

                        <input
                            wire:model="meta_title"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">

                    </div>


                    <div>

                        <label class="text-xs text-slate-600">
                            Meta Description
                        </label>

                        <textarea
                            wire:model="meta_description"
                            rows="3"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">
</textarea>

                    </div>


                    <div>

                        <label class="text-xs text-slate-600">
                            Keywords
                        </label>

                        <input
                            wire:model="meta_keywords"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">

                    </div>

                    <div>

                        <label class="text-xs text-slate-600">
                            Tags
                        </label>

                        <input
                            wire:model="tags"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm"
                            placeholder="e.g. interior design, architecture, office">

                        <p class="text-xs text-slate-400 mt-1">
                            Use comma-separated tags
                        </p>

                        @error('tags')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                    </div>

                </div>

            </div>



            <!-- Sidebar -->

            <div class="space-y-6">

                <!-- Publish Card -->

                <div class="bg-white rounded-lg shadow-sm p-6 space-y-4">

                    <h3 class="text-sm font-semibold text-slate-700">
                        Post Settings
                    </h3>


                    <div>

                        <label class="text-xs text-slate-600">
                            Category
                        </label>

                        <select
                            wire:model="category_id"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">

                            <option value="">Select category</option>

                            @foreach(App\Models\BlogCategory::where('is_active',true)->get() as $category)

                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>

                            @endforeach

                        </select>

                    </div>



                    <div>

                        <label class="text-xs text-slate-600">
                            Cover Image
                        </label>

                        <div class="mt-2 border border-dashed border-slate-300 rounded-md p-4 text-center">

                            @if($image)

                            <img
                                src="{{ $image->temporaryUrl() }}"
                                class="w-full h-40 object-cover rounded-md mb-3">

                            @endif

                            <input type="file" wire:model="image" class="text-sm">

                            <p class="text-xs text-slate-400 mt-1">
                                PNG or JPG up to 2MB
                            </p>

                        </div>

                        @error('image')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror

                    </div>



                    <div class="flex items-center gap-2">

                        <input type="checkbox" wire:model="is_active">

                        <span class="text-sm text-slate-600">
                            Publish Article
                        </span>

                    </div>

                </div>



                <!-- Publish Button -->

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md font-medium flex items-center justify-center gap-2">

                    <i class="ri-rocket-line"></i>
                    Publish Article

                </button>

            </div>

        </div>

    </form>

</div>
