<?php

use Livewire\Component;
use App\Models\Blog;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {

    public $deleteModal = false;
    public $blogId;

    public function confirmDelete($id)
    {
        $this->blogId = $id;
        $this->deleteModal = true;
    }

    public function delete()
    {
        Blog::findOrFail($this->blogId)->delete();
        $this->deleteModal = false;
        $this->dispatch('toast-show', ['message' => 'Blog post deleted!', 'type' => 'success']);
    }

    public function with()
    {
        return [
            'blogs' => Blog::with('category')->latest()->get()
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Header Section -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Articles & Blog Posts</h1>
            <p class="text-sm text-slate-500 mt-1">Manage your website's publications and insights.</p>
        </div>
        <a
            href="{{ route('admin.blog.add') }}"
            wire:navigate
            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-md active:scale-95">
            <i class="ri-article-line text-lg"></i>
            Create New Article
        </a>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-3xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200">
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Featured</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Details</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Category</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($blogs as $blog)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            @if($blog->image)
                            <img src="{{ Storage::url($blog->image) }}" class="w-16 h-12 object-cover rounded-xl shadow-sm border border-slate-100">
                            @else
                            <div class="w-16 h-12 bg-slate-100 rounded-xl flex items-center justify-center">
                                <i class="ri-image-line text-slate-300"></i>
                            </div>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <h4 class="text-sm font-semibold text-slate-800 group-hover:text-blue-600 transition-colors">{{ $blog->title }}</h4>
                            <p class="text-[10px] text-slate-400 mt-0.5 tracking-tight uppercase">/{{ $blog->slug }}</p>
                        </td>
                        <td class="px-6 py-4">
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-[10px] font-bold bg-indigo-50 text-indigo-600 border border-indigo-100">
                                {{ $blog->category->name }}
                            </span>
                        </td>
                        <td class="px-6 py-4">
                            @if($blog->is_active)
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                <span class="w-1 h-1 rounded-full bg-emerald-600"></span>
                                PUBLISHED
                            </span>
                            @else
                            <span class="inline-flex items-center gap-1 px-2 py-1 rounded-full text-[10px] font-bold bg-slate-100 text-slate-500 border border-slate-200">
                                DRAFT
                            </span>
                            @endif
                        </td>
                        <td class="px-6 py-4 text-right">
                            <div class="flex justify-end items-center gap-2">
                                <a
                                    href="{{ route('admin.blog.update', $blog->id) }}"
                                    wire:navigate
                                    class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                    title="Edit">
                                    <i class="ri-edit-circle-line text-lg"></i>
                                </a>
                                <button
                                    wire:click="confirmDelete({{ $blog->id }})"
                                    class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                    title="Delete">
                                    <i class="ri-delete-bin-line text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-24 text-center">
                            <div class="flex flex-col items-center gap-4">
                                <i class="ri-article-line text-6xl text-slate-200"></i>
                                <div class="space-y-1">
                                    <p class="text-lg font-bold text-slate-800">No blog posts found</p>
                                    <p class="text-sm text-slate-400">Time to write something interesting!</p>
                                </div>
                                <a href="{{ route('admin.blog.add') }}" class="mt-2 text-blue-600 font-bold text-sm underline decoration-2 underline-offset-4">Start your first post</a>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Confirmation Modal (Pines UI Style) -->
    <div
        x-data="{ show: @entangle('deleteModal') }"
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
            class="relative w-full max-w-sm bg-white rounded-3xl shadow-2xl p-8 text-center border border-slate-200">
            <div class="w-16 h-16 bg-rose-50 text-rose-600 rounded-2xl flex items-center justify-center mx-auto mb-6">
                <i class="ri-error-warning-line text-3xl"></i>
            </div>

            <h3 class="text-lg font-bold text-slate-800">Delete Post?</h3>
            <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                This article will be removed from your website immediately. This action cannot be undone.
            </p>

            <div class="mt-8 grid grid-cols-2 gap-3">
                <button
                    @click="show = false"
                    class="px-4 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-slate-100 transition-colors">
                    Keep it
                </button>
                <button
                    wire:click="delete"
                    class="px-4 py-2.5 bg-rose-600 hover:bg-rose-700 text-white rounded-xl text-sm font-bold shadow-md shadow-rose-100 active:scale-95 transition-all">
                    Delete Link
                </button>
            </div>
        </div>
    </div>

</div>