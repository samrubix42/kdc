<?php

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {

    public $name;
    public $client_info;
    public $message;
    public $is_active = true;

    public $testimonialId;
    public $showModal = false;
    public $showDeleteModal = false;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'client_info' => 'nullable|string|max:255',
        'message' => 'required|string',
        'is_active' => 'boolean'
    ];

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
        $this->reset(['name', 'client_info', 'message', 'testimonialId', 'editMode']);
        $this->is_active = true;
    }

    public function save()
    {
        $this->validate();

        Testimonial::create([
            'name' => $this->name,
            'client_info' => $this->client_info,
            'message' => $this->message,
            'is_active' => $this->is_active
        ]);

        $this->closeModal();
        $this->dispatch('toast-show', ['message' => 'Testimonial added successfully!', 'type' => 'success']);
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $this->testimonialId = $id;
        $this->name = $testimonial->name;
        $this->client_info = $testimonial->client_info;
        $this->message = $testimonial->message;
        $this->is_active = $testimonial->is_active;

        $this->editMode = true;
        $this->showModal = true;
    }

    public function update()
    {
        $this->validate();

        Testimonial::findOrFail($this->testimonialId)->update([
            'name' => $this->name,
            'client_info' => $this->client_info,
            'message' => $this->message,
            'is_active' => $this->is_active
        ]);

        $this->closeModal();
        $this->dispatch('toast-show', ['message' => 'Testimonial updated successfully!', 'type' => 'success']);
    }

    public function confirmDelete($id)
    {
        $this->testimonialId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        Testimonial::findOrFail($this->testimonialId)->delete();
        $this->showDeleteModal = false;
        $this->dispatch('toast-show', ['message' => 'Testimonial deleted successfully!', 'type' => 'success']);
    }

    public function with()
    {
        return [
            'testimonials' => Testimonial::latest()->get()
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6">

    <!-- Header -->
    <div class="flex flex-col md:flex-row md:items-center justify-between gap-4 mb-8">
        <div>
            <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Testimonials</h1>
            <p class="text-sm text-slate-500 mt-1">Manage client reviews and feedback.</p>
        </div>
        <button
            wire:click="openModal"
            class="inline-flex items-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-xl font-semibold transition-all shadow-sm active:scale-95">
            <i class="ri-add-circle-line text-lg"></i>
            Add Testimonial
        </button>
    </div>

    <!-- Table Card -->
    <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200">
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Client</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Message</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest">Status</th>
                        <th class="px-6 py-4 text-[11px] font-bold text-slate-500 uppercase tracking-widest text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($testimonials as $testimonial)
                    <tr class="hover:bg-slate-50/50 transition-colors group">
                        <td class="px-6 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-700 font-bold">
                                    {{ substr($testimonial->name, 0, 1) }}
                                </div>
                                <div>
                                    <h4 class="text-sm font-semibold text-slate-800">{{ $testimonial->name }}</h4>
                                    <p class="text-[11px] text-slate-400">{{ $testimonial->client_info ?? 'Verified Client' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <p class="text-sm text-slate-600 max-w-sm line-clamp-2 leading-relaxed">
                                {{ $testimonial->message }}
                            </p>
                        </td>
                        <td class="px-6 py-4">
                            @if($testimonial->is_active)
                            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold bg-emerald-50 text-emerald-600 border border-emerald-100">
                                <span class="w-1 h-1 rounded-full bg-emerald-600 animate-pulse"></span>
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
                                    wire:click="edit({{ $testimonial->id }})"
                                    class="p-2 text-slate-400 hover:text-blue-600 hover:bg-blue-50 rounded-lg transition-all"
                                    title="Edit">
                                    <i class="ri-edit-2-line text-lg"></i>
                                </button>
                                <button
                                    wire:click="confirmDelete({{ $testimonial->id }})"
                                    class="p-2 text-slate-400 hover:text-rose-600 hover:bg-rose-50 rounded-lg transition-all"
                                    title="Delete">
                                    <i class="ri-delete-bin-6-line text-lg"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-slate-400 h-64">
                            <div class="flex flex-col items-center gap-3">
                                <i class="ri-chat-voice-line text-5xl opacity-20"></i>
                                <p class="text-base font-medium">No testimonials found</p>
                                <p class="text-xs">Click the button above to add your first testimonial.</p>
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
            x-transition:enter-start="opacity-0 scale-95"
            x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="ease-in duration-200"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95"
            class="relative w-full max-w-lg bg-white rounded-3xl shadow-2xl border border-slate-200 overflow-hidden">
            <div class="px-8 py-6 border-b border-slate-100 flex justify-between items-center bg-slate-50/50">
                <div>
                    <h3 class="text-lg font-bold text-slate-800">{{ $editMode ? 'Edit Testimonial' : 'Create Testimonial' }}</h3>
                    <p class="text-[11px] text-slate-500 mt-0.5">Fill in the details below.</p>
                </div>
                <button @click="show = false" class="p-2 text-slate-400 hover:text-slate-600 transition-colors">
                    <i class="ri-close-line text-2xl"></i>
                </button>
            </div>

            <form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" class="p-8 space-y-5">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-1.5">Client Name</label>
                        <input
                            type="text"
                            wire:model="name"
                            class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all"
                            placeholder="e.g. John Doe">
                        @error('name') <span class="text-rose-500 text-[11px] mt-1">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-1.5">Designation</label>
                        <input
                            type="text"
                            wire:model="client_info"
                            class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all"
                            placeholder="e.g. CEO, Tech Corp">
                        @error('client_info') <span class="text-rose-500 text-[11px] mt-1">{{ $message }}</span> @enderror
                    </div>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-600 uppercase tracking-widest mb-1.5">Feedback Message</label>
                    <textarea
                        wire:model="message"
                        rows="4"
                        class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-blue-500 focus:ring-4 focus:ring-blue-500/10 outline-none transition-all"
                        placeholder="What did they say about you?"></textarea>
                    @error('message') <span class="text-rose-500 text-[11px] mt-1">{{ $message }}</span> @enderror
                </div>

                <div class="pt-2">
                    <label class="flex items-center gap-3 cursor-pointer group">
                        <div class="relative inline-flex items-center">
                            <input type="checkbox" wire:model="is_active" class="sr-only peer">
                            <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                        </div>
                        <span class="text-sm font-medium text-slate-700">Display on public site</span>
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
                        class="px-5 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-xl text-sm font-bold shadow-md shadow-blue-100 active:scale-95 transition-all">
                        {{ $editMode ? 'Update Testimonial' : 'Create Testimonial' }}
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

            <h3 class="text-lg font-bold text-slate-800">Delete Testimonial?</h3>
            <p class="text-sm text-slate-500 mt-2 leading-relaxed">
                This action cannot be undone. All data associated with this testimonial will be permanently removed.
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