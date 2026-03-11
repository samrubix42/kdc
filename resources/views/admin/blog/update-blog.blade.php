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

        $this->dispatch('toast-show', [
            'message' => 'Article updated successfully',
            'type' => 'success'
        ]);

        return redirect()->route('admin.blogs');
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">

    <!-- Header -->

    <div class="flex items-center justify-between mb-6">

        <div>
            <h1 class="text-lg font-semibold text-slate-800">Edit Article</h1>
            <p class="text-sm text-slate-500">Updating: {{ $title }}</p>
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

            <!-- Editor -->

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
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-lg font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">

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

                </div>


                <!-- TinyMCE Editor -->

                <div class="bg-white rounded-lg shadow-sm p-6">

                    <label class="text-xs font-medium text-slate-600">
                        Article Content
                    </label>

                    <div wire:ignore class="mt-2">

                        <div
                            x-data="{
value:@entangle('content'),
instance:null,
init(){
tinymce.init({
target:this.$refs.editor,
height:450,
menubar:false,
plugins:'advlist autolink lists link image preview code fullscreen',
toolbar:'undo redo | bold italic underline | alignleft aligncenter alignright | bullist numlist | link image | code',
setup:(editor)=>{
this.instance=editor;
editor.on('change',()=>{
this.value = editor.getContent()
});
editor.on('init',()=>{
editor.setContent(this.value || '')
});
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


                <!-- SEO -->

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

                </div>

            </div>



            <!-- Sidebar -->

            <div class="space-y-6">

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
                            Featured Image
                        </label>

                        <div class="mt-2 border border-dashed border-slate-300 rounded-md p-4 text-center">

                            @if($image)

                            <img
                                src="{{ $image->temporaryUrl() }}"
                                class="w-full h-40 object-cover rounded-md mb-3">

                            @elseif($oldImage)

                            <img
                                src="{{ Storage::url($oldImage) }}"
                                class="w-full h-40 object-cover rounded-md mb-3">

                            @endif

                            <input type="file" wire:model="image" class="text-sm">

                            <p class="text-xs text-slate-400 mt-1">
                                PNG or JPG up to 2MB
                            </p>

                        </div>

                    </div>



                    <div class="flex items-center gap-2">

                        <input type="checkbox" wire:model="is_active" {{ $is_active ? 'checked' : '' }}>

                        <span class="text-sm text-slate-600">
                            Publish Article
                        </span>

                    </div>

                </div>



                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md font-medium flex items-center justify-center gap-2">

                    <i class="ri-save-line"></i>
                    Update Article

                </button>

            </div>

        </div>

    </form>

</div>