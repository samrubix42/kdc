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
    public $slug;
    public $content;
    public $category_id;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $image;
    public $is_active = true;

    protected $rules = [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blogs,slug',
        'content' => 'required|string',
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
            'slug' => $this->slug,
            'content' => $this->content,
            'category_id' => $this->category_id,
            'meta_title' => $this->meta_title,
            'meta_description' => $this->meta_description,
            'meta_keywords' => $this->meta_keywords,
            'image' => $imagePath,
            'is_active' => $this->is_active
        ]);

        return redirect()->route('admin.blogs');
    }
};
?>

<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-slate-700">
            Add New Blog
        </h2>
        <a
            href="{{ route('admin.blogs') }}"
            wire:navigate
            class="text-gray-500 hover:text-gray-700">
            Back to List
        </a>
    </div>

    <form wire:submit.prevent="save" class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-2 space-y-6">
            <div class="bg-white p-6 rounded-xl shadow-sm space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Title</label>
                    <input type="text" wire:model.live="title" class="w-full border rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500 @error('title') border-red-500 @enderror">
                    @error('title') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Slug</label>
                    <input type="text" wire:model="slug" class="w-full border rounded-lg p-2 bg-gray-50">
                    @error('slug') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div
                    wire:ignore
                    x-data="{
                        content: @entangle('content'),
                        init() {
                            tinymce.init({
                                target: this.$refs.editor,
                                height: 400,
                                menubar: false,
                                plugins: [
                                    'advlist', 'autolink', 'lists', 'link', 'image', 'charmap', 'preview',
                                    'anchor', 'searchreplace', 'visualblocks', 'code', 'fullscreen',
                                    'insertdatetime', 'media', 'table', 'help', 'wordcount'
                                ],
                                toolbar: 'undo redo | blocks | ' +
                                    'bold italic backcolor | alignleft aligncenter ' +
                                    'alignright alignjustify | bullist numlist outdent indent | ' +
                                    'removeformat | help',
                                setup: (editor) => {
                                    editor.on('change keyup undo redo', () => {
                                        this.content = editor.getContent();
                                    });
                                }
                            });
                        }
                    }">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Content</label>
                    <textarea x-ref="editor" class="w-full border rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500 @error('content') border-red-500 @enderror"></textarea>
                    @error('content') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="bg-white p-6 rounded-xl shadow-sm space-y-4">
                <h3 class="font-semibold text-gray-700 border-b pb-2">SEO Details</h3>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                    <input type="text" wire:model="meta_title" class="w-full border rounded-lg p-2 focus:ring-blue-500">
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                    <textarea wire:model="meta_description" rows="3" class="w-full border rounded-lg p-2 focus:ring-blue-500"></textarea>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Meta Keywords</label>
                    <input type="text" wire:model="meta_keywords" class="w-full border rounded-lg p-2 focus:ring-blue-500">
                </div>
            </div>
        </div>

        <div class="lg:col-span-1 space-y-6">
            <div class="bg-white p-6 rounded-xl shadow-sm space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                    <select wire:model="category_id" class="w-full border rounded-lg p-2 focus:ring-blue-500 @error('category_id') border-red-500 @enderror">
                        <option value="">Select Category</option>
                        @foreach(App\Models\BlogCategory::where('is_active', true)->get() as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Featured Image</label>
                    <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-dashed rounded-lg border-gray-300">
                        <div class="space-y-1 text-center">
                            @if ($image)
                            <img src="{{ $image->temporaryUrl() }}" class="mx-auto h-32 w-32 object-cover rounded-lg mb-2">
                            @else
                            <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            @endif
                            <div class="flex text-sm text-gray-600">
                                <label for="file-upload" class="relative cursor-pointer bg-white rounded-md font-medium text-blue-600 hover:text-blue-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-blue-500">
                                    <span>Upload a file</span>
                                    <input id="file-upload" type="file" wire:model="image" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                        </div>
                    </div>
                    @error('image') <span class="text-red-500 text-xs">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center gap-2">
                    <input type="checkbox" wire:model="is_active" id="is_active" class="rounded text-blue-600">
                    <label for="is_active" class="text-sm text-gray-700">Active Status</label>
                </div>
            </div>

            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-3 rounded-xl shadow-lg transition-colors">
                Publish Blog
            </button>
        </div>
    </form>
</div>