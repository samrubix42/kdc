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

        $this->dispatch('toast-show', [
            'message' => 'Blog post deleted!',
            'type' => 'success'
        ]);
    }

    public function with()
    {
        return [
            'blogs' => Blog::with('category')->latest()->get()
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">


<!-- Header -->

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">

<div>
<h1 class="text-lg sm:text-xl font-semibold text-slate-800">Blog Posts</h1>
<p class="text-sm text-slate-500">Manage articles and publications</p>
</div>

<a
href="{{ route('admin.blog.add') }}"
wire:navigate
class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">

<i class="ri-add-line"></i>
New Article

</a>

</div>


<!-- Table -->

<div class="bg-white rounded-lg shadow-sm overflow-hidden">

<div class="overflow-x-auto">

<table class="w-full text-sm">

<thead class="bg-slate-50">

<tr>

<th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">
Preview
</th>

<th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">
Title
</th>

<th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">
Category
</th>

<th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">
Status
</th>

<th class="px-4 py-3 text-right text-xs font-medium text-slate-500 uppercase">
Actions
</th>

</tr>

</thead>


<tbody class="divide-y divide-slate-100">

@forelse($blogs as $blog)

<tr class="hover:bg-slate-50">

<td class="px-4 py-3">

@if($blog->image)

<img
src="{{ Storage::url($blog->image) }}"
class="w-14 h-10 object-cover rounded-md">

@else

<div class="w-14 h-10 bg-slate-100 rounded-md flex items-center justify-center">

<i class="ri-image-line text-slate-300"></i>

</div>

@endif

</td>


<td class="px-4 py-3">

<p class="font-medium text-slate-800 text-sm hover:text-blue-600">

{{ $blog->title }}

</p>

<p class="text-xs text-slate-400">

/{{ $blog->slug }}

</p>

</td>


<td class="px-4 py-3">

<span class="px-2 py-0.5 text-xs rounded-md bg-blue-50 text-blue-600">

{{ $blog->category->name }}

</span>

</td>


<td class="px-4 py-3">

@if($blog->is_active)

<span class="px-2 py-0.5 text-xs rounded-md bg-emerald-50 text-emerald-600">

Published

</span>

@else

<span class="px-2 py-0.5 text-xs rounded-md bg-slate-100 text-slate-500">

Draft

</span>

@endif

</td>


<td class="px-4 py-3 text-right">

<div class="flex justify-end gap-2">

<a
href="{{ route('admin.blog.update', $blog->id) }}"
wire:navigate
class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-slate-100">

<i class="ri-edit-line"></i>

</a>


<button
wire:click="confirmDelete({{ $blog->id }})"
class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-slate-100">

<i class="ri-delete-bin-line"></i>

</button>

</div>

</td>

</tr>


@empty

<tr>

<td colspan="5" class="py-20 text-center text-slate-400">

<i class="ri-article-line text-5xl mb-3"></i>

<p class="text-lg font-semibold text-slate-700">
No blog posts yet
</p>

<p class="text-sm text-slate-400">
Create your first article to get started
</p>

<a
href="{{ route('admin.blog.add') }}"
class="inline-block mt-3 text-blue-600 text-sm font-medium">

Create First Article

</a>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>



<!-- Delete Modal -->

<div
x-data="{ show: @entangle('deleteModal') }"
x-show="show"
x-cloak
class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">

<div class="bg-white rounded-lg shadow-xl w-full max-w-sm p-6 text-center">

<i class="ri-error-warning-line text-red-500 text-3xl"></i>

<h3 class="font-semibold text-slate-800 mt-3">
Delete Blog Post
</h3>

<p class="text-sm text-slate-500 mt-1">
This action cannot be undone
</p>

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