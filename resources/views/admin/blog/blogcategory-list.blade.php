<?php

use Livewire\Component;
use App\Models\BlogCategory;
use Illuminate\Support\Str;
use Livewire\Attributes\Layout;

new  #[Layout('layouts::admin')] class extends Component {

    public $categories;

    public $name;
    public $slug;
    public $is_active = true;

    public $categoryId;

    public $modal = false;
    public $deleteModal = false;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'slug' => 'required|string|max:255|unique:blog_categories,slug',
        'is_active' => 'boolean'
    ];

    public function mount()
    {
        $this->loadCategories();
    }

    public function loadCategories()
    {
        $this->categories = BlogCategory::latest()->get();
    }

    public function updatedName()
    {
        $this->slug = Str::slug($this->name);
    }

    public function openModal()
    {
        $this->resetForm();
        $this->modal = true;
    }

    public function closeModal()
    {
        $this->modal = false;
    }

    public function resetForm()
    {
        $this->reset(['name','slug','categoryId']);
        $this->is_active = true;
        $this->editMode = false;
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
        $this->loadCategories();
    }

    public function edit($id)
    {
        $category = BlogCategory::findOrFail($id);

        $this->categoryId = $id;
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->is_active = $category->is_active;

        $this->editMode = true;
        $this->modal = true;
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
        $this->loadCategories();
    }

    public function confirmDelete($id)
    {
        $this->categoryId = $id;
        $this->deleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->deleteModal = false;
    }

    public function delete()
    {
        BlogCategory::findOrFail($this->categoryId)->delete();

        $this->deleteModal = false;
        $this->loadCategories();
    }

};
?>

<div class="p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-semibold text-slate-700">
            Blog Categories
        </h2>

        <button
            wire:click="openModal"
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Add Category
        </button>

    </div>


    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

        <table class="w-full">

            <thead class="bg-gray-100 text-sm text-gray-600">

                <tr>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Slug</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Action</th>
                </tr>

            </thead>

            <tbody>

                @foreach($categories as $category)

                <tr class="border-t">

                    <td class="p-3">{{ $category->name }}</td>

                    <td class="p-3 text-gray-500">
                        {{ $category->slug }}
                    </td>

                    <td class="p-3">

                        @if($category->is_active)
                            <span class="text-green-600">Active</span>
                        @else
                            <span class="text-red-500">Inactive</span>
                        @endif

                    </td>

                    <td class="p-3 flex gap-3">

                        <button
                            wire:click="edit({{ $category->id }})"
                            class="text-blue-600">
                            Edit
                        </button>

                        <button
                            wire:click="confirmDelete({{ $category->id }})"
                            class="text-red-600">
                            Delete
                        </button>

                    </td>

                </tr>

                @endforeach

            </tbody>

        </table>

    </div>


    {{-- CREATE / EDIT MODAL --}}
    @if($modal)

    <div class="fixed inset-0 flex items-center justify-center bg-black/40">

        <div class="bg-white rounded-xl w-full max-w-lg p-6">

            <h2 class="text-lg font-semibold mb-4">

                {{ $editMode ? 'Edit Category' : 'Add Category' }}

            </h2>

            <div class="space-y-4">

                <input
                    type="text"
                    wire:model.live="name"
                    placeholder="Category Name"
                    class="w-full border rounded-lg p-2">

                <input
                    type="text"
                    wire:model="slug"
                    placeholder="Slug"
                    class="w-full border rounded-lg p-2">

                <label class="flex items-center gap-2">

                    <input type="checkbox" wire:model="is_active">

                    Active

                </label>

            </div>


            <div class="flex justify-end gap-3 mt-6">

                <button
                    wire:click="closeModal"
                    class="px-4 py-2 bg-gray-200 rounded-lg">
                    Cancel
                </button>

                @if($editMode)

                <button
                    wire:click="update"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Update
                </button>

                @else

                <button
                    wire:click="save"
                    class="px-4 py-2 bg-blue-500 text-white rounded-lg">
                    Save
                </button>

                @endif

            </div>

        </div>

    </div>

    @endif


    {{-- DELETE MODAL --}}
    @if($deleteModal)

    <div class="fixed inset-0 flex items-center justify-center bg-black/40">

        <div class="bg-white rounded-xl p-6 w-full max-w-sm">

            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Delete Category
            </h3>

            <p class="text-gray-500 mb-6">
                Are you sure you want to delete this category?
            </p>

            <div class="flex justify-end gap-3">

                <button
                    wire:click="closeDeleteModal"
                    class="px-4 py-2 bg-gray-200 rounded-lg">
                    Cancel
                </button>

                <button
                    wire:click="delete"
                    class="px-4 py-2 bg-red-500 text-white rounded-lg">
                    Delete
                </button>

            </div>

        </div>

    </div>

    @endif

</div>