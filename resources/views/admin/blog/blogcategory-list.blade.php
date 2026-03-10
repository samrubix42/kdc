<?php

use Livewire\Component;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {

    public $name;
    public $slug;
    public $is_active = true;

    public $categoryId;
    public $showModal = false;
    public $showDeleteModal = false;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blog_categories,slug',
        'is_active' => 'boolean'
    ];

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function openModal()
    {
        $this->resetForm();
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function resetForm()
    {
        $this->reset(['name', 'slug', 'categoryId', 'editMode']);
        $this->is_active = true;
    }

    public function save()
    {
        $this->validate();

        BlogCategory::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active
        ]);

        $this->closeModal();
        $this->dispatch('toast-show', ['message' => 'Category added successfully!', 'type' => 'success']);
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);

        $this->categoryId = $id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = $category->is_active;

        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:blog_categories,slug,' . $this->categoryId,
        ]);

        BlogCategory::findOrFail($this->categoryId)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active
        ]);

        $this->closeModal();
        $this->dispatch('toast-show', ['message' => 'Category updated successfully!', 'type' => 'success']);
    }

    public function confirmDelete($id)
    {
        $this->categoryId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        BlogCategory::findOrFail($this->categoryId)->delete();
        $this->showDeleteModal = false;
        $this->dispatch('toast-show', ['message' => 'Category deleted successfully!', 'type' => 'success']);
    }

    public function with()
    {
        return [
            'categories' => BlogCategory::latest()->get()
        ];
    }
};
?>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Blog Categories</h1>
            <p class="text-sm text-slate-500 mt-1">Organize your blog posts into meaningful topics.</p>
        </div>
        <button
            wire:click="openModal"
            class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-sm active:scale-95">
            <i class="ri-add-circle-line text-lg"></i>
            Add Category
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200">
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Name</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Slug</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest text-center">Posts</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $category)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <span class="text-sm font-semibold text-slate-800">{{ $category->name }}</span>
                        </td>
                        <td class="px-6 py-4">
                            <code class="text-[11px] bg-slate-100 px-2 py-1 rounded-md text-slate-500">/{{ $category->slug }}</code>
                        </td>
                        <td class="px-6 py-4 text-center">
                            <span class="text-xs font-medium text-slate-500">{{ App\Models\Blog::where('category_id', $category->id)->count() }}</span>
                        </td>
                        <td class="px-6 py-4">
                            @if($category->is_active)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                <span class="w-1 h-1 rounded-full bg-emerald-600"></span>
                                ACTIVE
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                INACTIVE
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-2">
                                <button
                                    wire:click="edit({{ $category->id }})"
                                    class="p-2 text-slate-400 hover:text-indigo-600 hover:bg-indigo-50 rounded-lg transition-all"
                                    title="Edit">
                                    <i class="ri-edit-2-line text-lg"></i>
                                </button>
                                <button
                                    wire:click="confirmDelete({{ $category->id }})"
                                    class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                    title="Delete">
                                    <i class="ri-delete-bin-6-line text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-12 text-center text-slate-400 h-64">
                            <div class="flex flex-col items-center gap-3">
                                <i class="ri-folders-line text-5xl opacity-20"></i>
                                <p class="text-base font-medium">No categories found</p>
                                <p class="text-xs">Categories help you group your blog posts.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Pines UI Modal (Add/Edit) -->
    <div
        x-data="{ show: @entangle('showModal') }"
        x-show="show"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="show = false"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm shadow-2xl"></div>

        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100 translate-y-0"
            x-transition:leave-end="opacity-0 scale-95 translate-y-4"
            class="relative w-full max-w-md bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">{{ $editMode ? 'Update' : 'Add' }} Category</h3>
                    <p class="text-[11px] text-slate-500 mt-0.5">Please provide the details below.</p>
                </div>
                <button @click="show = false" class="p-2 text-slate-400 hover:text-slate-600 transition-colors">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>

            <form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" class="p-8 space-y-5">
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-1.5">Category Name</label>
                    <input
                        type="text"
                        wire:model.live="name"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-indigo-500 focus:ring-4 focus:ring-indigo-500/10 outline-none transition-all"
                        placeholder="e.g. Technology">
                    @error('name') <span class="text-rose-500 text-[11px] mt-1">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-1.5">Slug (Auto-generated)</label>
                    <input
                        type="text"
                        wire:model="slug"
                        class="w-full rounded-xl border border-slate-300 bg-slate-50 px-4 py-2.5 text-sm focus:border-indigo-500 outline-none transition-all"
                        placeholder="e.g. technology">
                    @error('slug') <span class="text-rose-500 text-[11px] mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <div class="relative inline-flex items-center">
                            <input type="checkbox" wire:model="is_active" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-indigo-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-indigo-600"></div>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Display in public blog</span>
                    </label>
                </div>

                <div class="pt-4 flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                    <button
                        type="button"
                        @click="show = false"
                        class="px-5 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                        Cancel
                    </button>
                    <button
                        type="submit"
                        class="px-5 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl text-sm font-bold shadow-md shadow-indigo-100 active:scale-95 transition-all">
                        {{ $editMode ? 'Update Category' : 'Create Category' }}
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Pines UI Delete Confirmation Modal -->
    <div
        x-data="{ show: @entangle('showDeleteModal') }"
        x-show="show"
        x-cloak
        class="fixed inset-0 z-50 flex items-center justify-center p-4">
        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            @click="show = false"
            class="absolute inset-0 bg-slate-900/60 backdrop-blur-sm"></div>

        <div
            x-show="show"
            x-transition:enter="ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-y-4"
            x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 translate-y-4"
            class="relative w-full max-w-sm bg-white rounded-3xl shadow-2xl p-8 text-center">
            <div class="w-16 h-16 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="ri-error-warning-line text-3xl"></i>
            </div>

            <h3 class="text-lg font-bold text-slate-800">Delete Category?</h3>
            <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                Deleting this category might affect blog posts assigned to it. This action cannot be undone.
            </p>

            <div class="mt-8 grid grid-cols-2 gap-3">
                <button
                    @click="show = false"
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                    No, Keep it
                </button>
                <button
                    wire:click="delete"
                    class="px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-sm font-bold shadow-md shadow-rose-100 active:scale-95 transition-all">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>

</div>