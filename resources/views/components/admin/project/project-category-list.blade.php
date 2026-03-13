<?php

use Livewire\Component;
use App\Models\ProjectCategory;
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
        'slug' => 'required|string|max:255|unique:project_categories,slug',
        'is_active' => 'boolean',
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

        ProjectCategory::create([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
        ]);

        $this->closeModal();

        $this->dispatch('toast-show', [
            'message' => 'Project category added successfully',
            'type' => 'success',
        ]);
    }

    public function edit($id)
    {
        $category = ProjectCategory::findOrFail($id);

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
            'slug' => 'required|string|max:255|unique:project_categories,slug,' . $this->categoryId,
        ]);

        ProjectCategory::findOrFail($this->categoryId)->update([
            'name' => $this->name,
            'slug' => $this->slug,
            'is_active' => $this->is_active,
        ]);

        $this->closeModal();

        $this->dispatch('toast-show', [
            'message' => 'Project category updated successfully',
            'type' => 'success',
        ]);
    }

    public function confirmDelete($id)
    {
        $this->categoryId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        ProjectCategory::findOrFail($this->categoryId)->delete();

        $this->showDeleteModal = false;

        $this->dispatch('toast-show', [
            'message' => 'Project category deleted successfully',
            'type' => 'success',
        ]);
    }

    public function with()
    {
        return [
            'categories' => ProjectCategory::latest()->get(),
        ];
    }
};
?>

<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-lg sm:text-xl font-semibold text-slate-800">Project Categories</h1>
                <p class="text-sm text-slate-500">Organize project items into categories</p>
            </div>

            <button
                wire:click="openModal"
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">
                <i class="ri-add-line"></i>
                Add Category
            </button>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Name</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Slug</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Status</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 uppercase">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($categories as $category)
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-3 font-medium text-slate-800">
                                    {{ $category->name }}
                                </td>
                                <td class="px-4 py-3 text-slate-500 text-xs">
                                    /{{ $category->slug }}
                                </td>
                                <td class="px-4 py-3">
                                    @if($category->is_active)
                                        <span class="px-2 py-0.5 text-xs rounded-md bg-blue-50 text-blue-600">Active</span>
                                    @else
                                        <span class="px-2 py-0.5 text-xs rounded-md bg-slate-100 text-slate-500">Inactive</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-right">
                                    <div class="flex justify-end gap-2">
                                        <button
                                            wire:click="edit({{ $category->id }})"
                                            class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-slate-100">
                                            <i class="ri-edit-line"></i>
                                        </button>

                                        <button
                                            wire:click="confirmDelete({{ $category->id }})"
                                            class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-slate-100">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="py-16 text-center text-slate-400">
                                    <i class="ri-folder-line text-4xl mb-2"></i>
                                    <p>No project categories found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div
            x-data="{ show: @entangle('showModal') }"
            x-show="show"
            x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">

            <div class="bg-white rounded-lg w-full max-w-md shadow-xl">
                <div class="flex items-center justify-between px-5 py-4">
                    <h3 class="text-sm font-semibold text-slate-800">
                        {{ $editMode ? 'Update Project Category' : 'Add Project Category' }}
                    </h3>
                    <button @click="show=false">
                        <i class="ri-close-line text-lg text-slate-400"></i>
                    </button>
                </div>

                <form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" class="px-5 pb-5 space-y-4">
                    <div>
                        <label class="text-xs font-medium text-slate-600">Category Name</label>
                        <input
                            type="text"
                            wire:model.live="name"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                        @error('name')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-600">Slug</label>
                        <input
                            type="text"
                            wire:model="slug"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm bg-slate-50">
                        @error('slug')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex items-center gap-2">
                        <input type="checkbox" wire:model="is_active">
                        <span class="text-sm text-slate-600">Active category</span>
                    </div>

                    <div class="flex justify-end gap-2 pt-2">
                        <button
                            type="button"
                            @click="show=false"
                            class="px-3 py-1.5 text-sm rounded-md text-slate-600 hover:bg-slate-100">
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm">
                            {{ $editMode ? 'Update' : 'Create' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <div
            x-data="{ show: @entangle('showDeleteModal') }"
            x-show="show"
            x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">

            <div class="bg-white rounded-lg shadow-xl w-full max-w-sm p-6 text-center">
                <i class="ri-error-warning-line text-red-500 text-3xl"></i>
                <h3 class="font-semibold text-slate-800 mt-3">Delete Project Category</h3>
                <p class="text-sm text-slate-500 mt-1">This action cannot be undone</p>

                <div class="flex justify-center gap-3 mt-6">
                    <button
                        @click="show=false"
                        class="px-3 py-1.5 text-sm rounded-md text-slate-600 hover:bg-slate-100">
                        Cancel
                    </button>

                    <button
                        wire:click="delete"
                        class="px-3 py-1.5 bg-red-600 hover:bg-red-700 text-white rounded-md text-sm">
                        Delete
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
