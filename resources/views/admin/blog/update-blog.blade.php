<?php

use Livewire\Component;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

new #[Layout('layouts::admin')] class extends Component {
    use WithFileUploads;

    public $blog;
    public $title;
    public $slug;
    public $content;
    public $category_id;
    public $meta_title;
    public $meta_description;
    public $meta_keywords;
    public $image;
    public $oldImage;
    public $is_active;

    public function mount($id)
    {
        $this->blog = Blog::findOrFail($id);
        $this->title = $this->blog->title;
        $this->slug = $this->blog->slug;
        $this->content = $this->blog->content;
        $this->category_id = $this->blog->category_id;
        $this->meta_title = $this->blog->meta_title;
        $this->meta_description = $this->blog->meta_description;
        $this->meta_keywords = $this->blog->meta_keywords;
        $this->oldImage = $this->blog->image;
        $this->is_active = $this->blog->is_active;
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blogs,slug,' . $this->blog->id,
            'content' => 'required|string',
            'category_id' => 'required|exists:blog_categories,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'meta_keywords' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'boolean'
        ]);

        $imagePath = $this->oldImage;
        if ($this->image) {
            // Optional: Storage::disk('public')->delete($this->oldImage);
            $imagePath = $this->image->store('blogs', 'public');
        }

        $this->blog->update([
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

        $this->dispatch('toast-show', ['message' => 'Article updated!', 'type' => 'success']);
        return redirect()->route('admin.blogs');
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">

    <!-- Header Section -->
    <div class="mb-6 flex items-center justify-between">
        <div>
            <h1 class="text-xl font-bold text-slate-800 tracking-tight">Edit Article</h1>
            <p class="text-[11px] text-slate-500 mt-0.5 tracking-wide uppercase">Managing: {{ $title }}</p>
        </div>
        <a href="{{ route('admin.blogs') }}" wire:navigate class="inline-flex items-center gap-2 text-sm font-semibold text-slate-600 hover:text-slate-900 transition-colors">
            <i class="ri-arrow-left-s-line text-lg"></i>
            Discard Changes
        </a>
    </div>

    <form wire:submit.prevent="save" class="space-y-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            <!-- MAIN CONTENT AREA -->
            <div class="lg:col-span-2 space-y-6">

                <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm space-y-5">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-2">Post Title</label>
                        <input
                            wire:model.live="title"
                            type="text"
                            class="w-full rounded-2xl border border-slate-300 px-4 py-3 text-lg font-semibold focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all">
                        @error('title') <span class="text-rose-500 text-[11px] mt-2 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-2">Permalink / Slug</label>
                        <div class="flex items-center">
                            <span class="bg-slate-50 border border-r-0 border-slate-300 px-3 py-2.5 rounded-l-xl text-[11px] text-slate-400 font-mono">/blog/</span>
                            <input
                                wire:model="slug"
                                type="text"
                                class="flex-1 rounded-r-xl border border-slate-300 px-3 py-2.5 text-xs font-mono bg-slate-50/50 outline-none focus:border-blue-500 transition-all">
                        </div>
                        @error('slug') <span class="text-rose-500 text-[11px] mt-2 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    <div wire:ignore>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-2">Article Body</label>
                        <div
                            x-data="{
                                value: @entangle('content'),
                                instance: null,
                                init() {
                                    if (this.instance) { tinymce.remove(this.instance); }
                                    tinymce.init({
                                        target: this.$refs.editor,
                                        height: 500,
                                        menubar: false,
                                        plugins: 'advlist autolink lists link image preview code fullscreen wordcount help',
                                        toolbar: 'undo redo | blocks | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist | image link | removeformat code help',
                                        content_style: 'body { font-family:Inter,Helvetica,Arial,sans-serif; font-size:14px }',
                                        setup: (editor) => {
                                            this.instance = editor;
                                            editor.on('change', () => {
                                                this.value = editor.getContent();
                                            });
                                            editor.on('init', () => {
                                                editor.setContent(this.value || '');
                                            });
                                        }
                                    });
                                }
                            }">
                            <textarea x-ref="editor"></textarea>
                        </div>
                    </div>
                    @error('content') <span class="text-rose-500 text-[11px] mt-2 block font-medium">{{ $message }}</span> @enderror
                </div>

                <!-- SEO Section -->
                <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm">
                    <div class="flex items-center gap-2 mb-6 border-b border-slate-100 pb-4 text-slate-800">
                        <i class="ri-search-eye-line text-blue-500 text-xl"></i>
                        <h3 class="text-sm font-bold uppercase tracking-widest">Search Engine Visualization</h3>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 tracking-widest mb-1.5 uppercase">Meta Title</label>
                            <input wire:model="meta_title" type="text" class="w-full rounded-xl border border-slate-300 px-4 py-2 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 placeholder:text-slate-300">
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 tracking-widest mb-1.5 uppercase">Meta Description</label>
                            <textarea wire:model="meta_description" rows="3" class="w-full rounded-xl border border-slate-300 px-4 py-2 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 placeholder:text-slate-300"></textarea>
                        </div>

                        <div>
                            <label class="block text-[10px] font-bold text-slate-600 tracking-widest mb-1.5 uppercase">Keywords</label>
                            <input wire:model="meta_keywords" type="text" class="w-full rounded-xl border border-slate-300 px-4 py-2 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 placeholder:text-slate-300 px-4 py-2 text-sm outline-none focus:border-blue-500 focus:ring-2 focus:ring-blue-500/10 placeholder:text-slate-300">
                        </div>
                    </div>
                </div>

            </div>

            <!-- RIGHT SETTINGS BAR -->
            <div class="space-y-6">

                <div class="bg-white rounded-3xl border border-slate-200 p-8 shadow-sm space-y-6">

                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-3">Target Category</label>
                        <select wire:model="category_id" class="w-full rounded-xl border border-slate-300 px-4 py-3 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none appearance-none bg-[url('https://cdn0.iconfinder.com/data/icons/arrows-11/24/Chevron_Down-512.png')] bg-[length:14px] bg-[right_16px_center] bg-no-repeat transition-all shadow-sm active:scale-95 transition-all">
                            <option value="">Choose a topic...</option>
                            @foreach(App\Models\BlogCategory::where('is_active', true)->get() as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id') <span class="text-rose-500 text-[11px] mt-2 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-3">Featured Photo</label>
                        <div class="group relative mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-300 border-dashed rounded-3xl hover:border-blue-500 hover:bg-blue-50/20 transition-all cursor-pointer overflow-hidden">
                            <div class="space-y-1 text-center py-4">
                                @if ($image)
                                <div class="absolute inset-0 bg-white">
                                    <img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                                        <span class="text-white text-xs font-bold bg-blue-600 px-3 py-1 rounded-full">CHANGE IMAGE</span>
                                    </div>
                                </div>
                                @elseif ($oldImage)
                                <div class="absolute inset-0 bg-white">
                                    <img src="{{ Storage::url($oldImage) }}" class="w-full h-full object-cover">
                                    <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center">
                                        <span class="text-white text-xs font-bold bg-blue-600 px-3 py-1 rounded-full">REPLACE IMAGE</span>
                                    </div>
                                </div>
                                @else
                                <i class="ri-landscape-line text-4xl text-slate-300 block mb-2"></i>
                                <div class="flex text-sm text-slate-600">
                                    <label class="relative cursor-pointer font-bold text-blue-600">
                                        <span>Upload primary visual</span>
                                        <input type="file" wire:model="image" class="sr-only">
                                    </label>
                                </div>
                                <p class="text-[10px] text-slate-400">PNG, JPG up to 2MB</p>
                                @endif
                            </div>
                        </div>
                        @error('image') <span class="text-rose-500 text-[11px] mt-2 block font-medium">{{ $message }}</span> @enderror
                    </div>

                    <div class="pt-6 border-t border-slate-100">
                        <label class="flex items-center gap-3 cursor-pointer group">
                            <div class="relative inline-flex items-center">
                                <input type="checkbox" wire:model="is_active" class="sr-only peer">
                                <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                            </div>
                            <span class="text-sm font-bold text-slate-700">Display Live</span>
                        </label>
                    </div>

                </div>

                <div class="sticky top-24">
                    <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-black uppercase tracking-widest py-4 rounded-3xl shadow-xl shadow-blue-100 transition-all active:scale-95 flex items-center justify-center gap-3">
                        <i class="ri-save-3-line text-xl"></i>
                        Update Article
                    </button>
                    <p class="text-center text-[10px] text-slate-400 mt-4 leading-relaxed px-4 italic">
                        By updating, the live site will reflect these changes immediately.
                    </p>
                </div>

            </div>
        </div>
    </form>
</div>