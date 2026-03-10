<?php

use Livewire\Component;
use App\Models\Blog;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {

    public $blogs;
    public $deleteModal = false;
    public $blogId;

    public function mount()
    {
        $this->loadBlogs();
    }

    public function loadBlogs()
    {
        $this->blogs = Blog::with('category')->latest()->get();
    }

    public function confirmDelete($id)
    {
        $this->blogId = $id;
        $this->deleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->deleteModal = false;
    }

    public function delete()
    {
        Blog::findOrFail($this->blogId)->delete();
        $this->deleteModal = false;
        $this->loadBlogs();
    }
};
?>

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-slate-700">
            Blogs
        </h2>
        <a
            href="{{ route('admin.blog.add') }}"
            wire:navigate
            class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg">
            Add Blog
        </a>
    </div>

    {{-- TABLE --}}
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100 text-sm text-gray-600">
                <tr>
                    <th class="p-3 text-left">Image</th>
                    <th class="p-3 text-left">Title</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-left">Status</th>
                    <th class="p-3 text-left">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr class="border-t">
                    <td class="p-3">
                        @if($blog->image)
                        <img src="{{ Storage::url($blog->image) }}" class="w-12 h-12 object-cover rounded-lg">
                        @else
                        <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center text-xs text-gray-400">No Image</div>
                        @endif
                    </td>
                    <td class="p-3">{{ $blog->title }}</td>
                    <td class="p-3 text-gray-500">{{ $blog->category->name }}</td>
                    <td class="p-3">
                        @if($blog->is_active)
                        <span class="text-green-600">Active</span>
                        @else
                        <span class="text-red-500">Inactive</span>
                        @endif
                    </td>
                    <td class="p-3 flex gap-3">
                        <a
                            href="{{ route('admin.blog.update', $blog->id) }}"
                            wire:navigate
                            class="text-blue-600">
                            Edit
                        </a>
                        <button
                            wire:click="confirmDelete({{ $blog->id }})"
                            class="text-red-600">
                            Delete
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- DELETE MODAL --}}
    @if($deleteModal)
    <div class="fixed inset-0 flex items-center justify-center bg-black/40">
        <div class="bg-white rounded-xl p-6 w-full max-w-sm">
            <h3 class="text-lg font-semibold text-gray-700 mb-4">
                Delete Blog
            </h3>
            <p class="text-gray-500 mb-6">
                Are you sure you want to delete this blog post?
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