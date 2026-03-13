<?php

use Livewire\Component;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {
    public $projectId;
    public $deleteModal = false;

    public function confirmDelete($id)
    {
        $this->projectId = $id;
        $this->deleteModal = true;
    }

    public function delete()
    {
        $project = Project::with('images')->findOrFail($this->projectId);

        foreach ($project->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }

        $project->delete();

        $this->deleteModal = false;

        $this->dispatch('toast-show', [
            'message' => 'Project deleted successfully',
            'type' => 'success',
        ]);
    }

    public function with()
    {
        return [
            'projects' => Project::with(['category', 'images'])->latest()->get(),
        ];
    }
};
?>

<div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">

        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
            <div>
                <h1 class="text-lg sm:text-xl font-semibold text-slate-800">Project List</h1>
                <p class="text-sm text-slate-500">Manage projects and slider images</p>
            </div>

            <a
                href="{{ route('admin.project.add') }}"
                wire:navigate
                class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium">
                <i class="ri-add-line"></i>
                Add Project
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead class="bg-slate-50">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Preview</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Title</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Category</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Completion</th>
                            <th class="px-4 py-3 text-center text-xs font-medium text-slate-500 uppercase">Images</th>
                            <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 uppercase">Actions</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-slate-100">
                        @forelse($projects as $project)
                            @php
                                $primary = $project->images->firstWhere('is_primary', true) ?? $project->images->first();
                            @endphp
                            <tr class="hover:bg-slate-50">
                                <td class="px-4 py-3">
                                    @if($primary)
                                        <img src="{{ Storage::url($primary->image_path) }}" class="w-14 h-10 object-cover rounded-md">
                                    @else
                                        <div class="w-14 h-10 bg-slate-100 rounded-md flex items-center justify-center">
                                            <i class="ri-image-line text-slate-300"></i>
                                        </div>
                                    @endif
                                </td>

                                <td class="px-4 py-3">
                                    <p class="font-medium text-slate-800 text-sm">{{ $project->title }}</p>
                                    <p class="text-xs text-slate-400">/{{ $project->slug }}</p>
                                </td>

                                <td class="px-4 py-3">
                                    <span class="px-2 py-0.5 text-xs rounded-md bg-blue-50 text-blue-600">
                                        {{ $project->category?->name ?? 'N/A' }}
                                    </span>
                                </td>

                                <td class="px-4 py-3 text-slate-600 text-xs">
                                    {{ optional($project->completion_date)->format('M d, Y') ?? '-' }}
                                </td>

                                <td class="px-4 py-3 text-center text-slate-500">
                                    {{ $project->images->count() }}
                                </td>

                                <td class="px-4 py-3 text-right">
                                    <div class="flex justify-end gap-2">
                                        <a
                                            href="{{ route('admin.project.update', $project->id) }}"
                                            wire:navigate
                                            class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-slate-100">
                                            <i class="ri-edit-line"></i>
                                        </a>

                                        <button
                                            wire:click="confirmDelete({{ $project->id }})"
                                            class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-slate-100">
                                            <i class="ri-delete-bin-line"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="py-16 text-center text-slate-400">
                                    <i class="ri-briefcase-line text-4xl mb-2"></i>
                                    <p>No projects found</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <div
            x-data="{ show: @entangle('deleteModal') }"
            x-show="show"
            x-cloak
            class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">

            <div class="bg-white rounded-lg shadow-xl w-full max-w-sm p-6 text-center">
                <i class="ri-error-warning-line text-red-500 text-3xl"></i>
                <h3 class="font-semibold text-slate-800 mt-3">Delete Project</h3>
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
