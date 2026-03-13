<?php

use Livewire\Component;
use App\Models\Project;
use App\Models\ProjectImage;
use App\Models\ProjectCategory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {
    use WithFileUploads;

    public $project;
    public $title;
    public $project_type;
    public $slug;
    public $description;
    public $clients;
    public $completion_date;
    public $architects;
    public $newImages = [];
    public $existingImages = [];

    public function mount($id)
    {
        $this->project = Project::with(['images' => fn ($q) => $q->orderByDesc('is_primary')->orderBy('id')])->findOrFail($id);

        $this->title = $this->project->title;
        $this->project_type = $this->project->project_type;
        $this->slug = $this->project->slug;
        $this->description = $this->project->description;
        $this->clients = $this->project->clients;
        $this->completion_date = optional($this->project->completion_date)->format('Y-m-d');
        $this->architects = $this->project->architects;
        $this->existingImages = $this->project->images->map(fn ($image) => [
            'id' => $image->id,
            'path' => $image->image_path,
            'is_primary' => $image->is_primary,
        ])->toArray();
    }

    public function updatedTitle()
    {
        $this->slug = Str::slug($this->title);
    }

    public function removeNewImage($index)
    {
        unset($this->newImages[$index]);
        $this->newImages = array_values($this->newImages);
    }

    public function clearNewImages()
    {
        $this->newImages = [];
    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'project_type' => 'required|exists:project_categories,id',
            'slug' => 'required|string|max:255|unique:projects,slug,' . $this->project->id,
            'description' => 'required|string',
            'clients' => 'nullable|string|max:255',
            'completion_date' => 'nullable|date',
            'architects' => 'nullable|string|max:255',
            'newImages' => 'nullable|array',
            'newImages.*' => 'image|max:4096',
        ]);

        DB::transaction(function () {
            $this->project->update([
                'title' => $this->title,
                'project_type' => $this->project_type,
                'slug' => $this->slug,
                'description' => $this->description,
                'clients' => $this->clients,
                'completion_date' => $this->completion_date,
                'architects' => $this->architects,
            ]);

            if (!empty($this->newImages)) {
                $hasPrimary = $this->project->images()->where('is_primary', true)->exists();

                foreach ($this->newImages as $index => $image) {
                    $path = $image->store('projects', 'public');

                    ProjectImage::create([
                        'project_id' => $this->project->id,
                        'image_path' => $path,
                        'is_primary' => !$hasPrimary && $index === 0,
                    ]);
                }
            }
        });

        $this->refreshImages();

        $this->dispatch('toast-show', [
            'message' => 'Project updated successfully',
            'type' => 'success',
        ]);

        return redirect()->route('admin.portfolio.list');
    }

    public function removeImage($imageId)
    {
        $image = ProjectImage::where('project_id', $this->project->id)->findOrFail($imageId);
        $wasPrimary = $image->is_primary;

        Storage::disk('public')->delete($image->image_path);
        $image->delete();

        if ($wasPrimary) {
            $fallback = ProjectImage::where('project_id', $this->project->id)->first();
            if ($fallback) {
                $fallback->update(['is_primary' => true]);
            }
        }

        $this->refreshImages();
    }

    public function setPrimary($imageId)
    {
        ProjectImage::where('project_id', $this->project->id)->update(['is_primary' => false]);
        ProjectImage::where('project_id', $this->project->id)->where('id', $imageId)->update(['is_primary' => true]);

        $this->refreshImages();
    }

    protected function refreshImages()
    {
        $this->project = Project::with(['images' => fn ($q) => $q->orderByDesc('is_primary')->orderBy('id')])->findOrFail($this->project->id);

        $this->existingImages = $this->project->images->map(fn ($image) => [
            'id' => $image->id,
            'path' => $image->image_path,
            'is_primary' => $image->is_primary,
        ])->toArray();
    }

    public function with()
    {
        return [
            'categories' => ProjectCategory::where('is_active', true)->orderBy('name')->get(),
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">
    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-lg font-semibold text-slate-800">Update Project</h1>
            <p class="text-sm text-slate-500">Editing: {{ $title }}</p>
        </div>

        <a
            href="{{ route('admin.portfolio.list') }}"
            wire:navigate
            class="text-sm text-slate-600 hover:text-slate-900 flex items-center gap-1">
            <i class="ri-arrow-left-line"></i>
            Back
        </a>
    </div>

    <form wire:submit.prevent="save">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-2 space-y-6">
                <div class="bg-white rounded-lg shadow-sm p-6 space-y-4">
                    <div>
                        <label class="text-xs font-medium text-slate-600">Project Title</label>
                        <input
                            wire:model.live="title"
                            type="text"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-lg font-semibold focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-600">Slug</label>
                        <div class="flex items-center mt-1">
                            <span class="text-xs text-slate-400 bg-slate-50 border border-slate-200 px-2 py-2 rounded-l-md">/project/</span>
                            <input wire:model="slug" type="text" class="flex-1 border border-slate-300 border-l-0 rounded-r-md px-3 py-2 text-sm">
                        </div>
                        @error('slug')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs font-medium text-slate-600">Description</label>
                        <textarea
                            wire:model="description"
                            rows="8"
                            class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"></textarea>
                        @error('description')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6 space-y-3">
                    <h3 class="text-sm font-semibold text-slate-700">Add More Slider Images</h3>
                    <div class="border-2 border-dashed border-slate-300 rounded-lg p-5 bg-slate-50/60">
                        <div class="flex items-start gap-3">
                            <div class="w-9 h-9 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center">
                                <i class="ri-image-add-line"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-slate-700">Upload Extra Slider Images</p>
                                <p class="text-xs text-slate-500 mt-0.5">Add more JPG/PNG files up to 4MB each.</p>
                            </div>
                        </div>
                        <input type="file" wire:model="newImages" multiple class="text-sm w-full mt-3">
                    </div>
                    @error('newImages')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror
                    @error('newImages.*')
                        <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                    @enderror

                    @if(!empty($newImages))
                        <div class="flex items-center justify-between pt-1">
                            <p class="text-xs text-slate-500">{{ count($newImages) }} image(s) selected</p>
                            <button
                                type="button"
                                wire:click="clearNewImages"
                                class="text-xs text-red-600 hover:text-red-700">
                                Clear all
                            </button>
                        </div>

                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-1">
                            @foreach($newImages as $index => $image)
                                <div class="border border-slate-200 rounded-md p-2 bg-white">
                                    <img src="{{ $image->temporaryUrl() }}" class="h-24 w-full object-cover rounded-md">
                                    <div class="mt-1 flex items-center justify-between gap-2">
                                        <p class="text-[11px] text-slate-500">New image</p>
                                        <button
                                            type="button"
                                            wire:click="removeNewImage({{ $index }})"
                                            class="text-[11px] text-red-600 hover:text-red-700">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>

                <div class="bg-white rounded-lg shadow-sm p-6">
                    <h3 class="text-sm font-semibold text-slate-700 mb-3">Current Slider Images</h3>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        @forelse($existingImages as $image)
                            <div class="border border-slate-200 rounded-md p-2">
                                <img src="{{ Storage::url($image['path']) }}" class="h-24 w-full object-cover rounded-md">
                                <div class="mt-2 flex items-center gap-2">
                                    @if($image['is_primary'])
                                        <span class="text-[10px] bg-emerald-50 text-emerald-600 px-1.5 py-0.5 rounded">Primary</span>
                                    @else
                                        <button
                                            type="button"
                                            wire:click="setPrimary({{ $image['id'] }})"
                                            class="text-[10px] px-1.5 py-0.5 rounded bg-blue-50 text-blue-600 hover:bg-blue-100">
                                            Set Primary
                                        </button>
                                    @endif
                                    <button
                                        type="button"
                                        wire:click="removeImage({{ $image['id'] }})"
                                        class="text-[10px] px-1.5 py-0.5 rounded bg-red-50 text-red-600 hover:bg-red-100">
                                        Remove
                                    </button>
                                </div>
                            </div>
                        @empty
                            <p class="text-sm text-slate-500 col-span-4">No images found.</p>
                        @endforelse
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="bg-white rounded-lg shadow-sm p-6 space-y-4">
                    <h3 class="text-sm font-semibold text-slate-700">Project Settings</h3>

                    <div>
                        <label class="text-xs text-slate-600">Category</label>
                        <select wire:model="project_type" class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">
                            <option value="">Select category</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('project_type')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs text-slate-600">Client</label>
                        <input wire:model="clients" type="text" class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">
                        @error('clients')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs text-slate-600">Completion Date</label>
                        <input wire:model="completion_date" type="date" class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">
                        @error('completion_date')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="text-xs text-slate-600">Architects</label>
                        <input wire:model="architects" type="text" placeholder="e.g. Logan Cee or ABC Studio" class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm">
                        @error('architects')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <button
                    type="submit"
                    class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-md font-medium flex items-center justify-center gap-2">
                    <i class="ri-save-line"></i>
                    Update Project
                </button>
            </div>
        </div>
    </form>
</div>
