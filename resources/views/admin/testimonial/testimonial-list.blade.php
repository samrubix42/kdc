<?php

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {

    public $testimonials;

    public $name;
    public $client_info;
    public $message;
    public $is_active = true;

    public $testimonialId;

    public $modal = false;
    public $deleteModal = false;
    public $editMode = false;

    protected $rules = [
        'name' => 'required|string|max:255',
        'client_info' => 'nullable|string|max:255',
        'message' => 'required|string',
        'is_active' => 'boolean'
    ];

    public function mount()
    {
        $this->loadTestimonials();
    }

    public function loadTestimonials()
    {
        $this->testimonials = Testimonial::latest()->get();
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
        $this->reset(['name','client_info','message','testimonialId']);
        $this->is_active = true;
        $this->editMode = false;
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
        $this->loadTestimonials();
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
        $this->modal = true;
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
        $this->loadTestimonials();
    }

    public function confirmDelete($id)
    {
        $this->testimonialId = $id;
        $this->deleteModal = true;
    }

    public function closeDeleteModal()
    {
        $this->deleteModal = false;
    }

    public function delete()
    {
        Testimonial::findOrFail($this->testimonialId)->delete();

        $this->deleteModal = false;
        $this->loadTestimonials();
    }

};
?>

<div class="p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-xl font-semibold text-slate-700">Testimonials</h2>

        <button
            wire:click="openModal"
            class="bg-sky-500 hover:bg-sky-600 text-white px-4 py-2 rounded-lg">
            Add Testimonial
        </button>
    </div>

    <div class="bg-white rounded-xl shadow-sm overflow-hidden">

        <table class="w-full">

            <thead class="bg-slate-100 text-sm text-slate-600">
                <tr>
                    <th class="p-3">Name</th>
                    <th class="p-3">Client Info</th>
                    <th class="p-3">Message</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Action</th>
                </tr>
            </thead>

            <tbody>

                @foreach($testimonials as $testimonial)

                <tr class="border-t">

                    <td class="p-3">{{ $testimonial->name }}</td>

                    <td class="p-3">{{ $testimonial->client_info }}</td>

                    <td class="p-3 max-w-xs truncate">
                        {{ $testimonial->message }}
                    </td>

                    <td class="p-3">
                        @if($testimonial->is_active)
                            <span class="text-green-600">Active</span>
                        @else
                            <span class="text-red-500">Inactive</span>
                        @endif
                    </td>

                    <td class="p-3 flex gap-3">

                        <button
                            wire:click="edit({{ $testimonial->id }})"
                            class="text-blue-600">
                            Edit
                        </button>

                        <button
                            wire:click="confirmDelete({{ $testimonial->id }})"
                            class="text-red-500">
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
                {{ $editMode ? 'Edit Testimonial' : 'Add Testimonial' }}
            </h2>

            <div class="space-y-4">

                <input
                    type="text"
                    wire:model="name"
                    placeholder="Client Name"
                    class="w-full border rounded-lg p-2">

                <input
                    type="text"
                    wire:model="client_info"
                    placeholder="Company / Designation"
                    class="w-full border rounded-lg p-2">

                <textarea
                    wire:model="message"
                    placeholder="Message"
                    class="w-full border rounded-lg p-2"></textarea>

                <label class="flex items-center gap-2">
                    <input type="checkbox" wire:model="is_active">
                    Active
                </label>

            </div>

            <div class="flex justify-end gap-3 mt-6">

                <button
                    wire:click="closeModal"
                    class="px-4 py-2 bg-slate-200 rounded-lg">
                    Cancel
                </button>

                @if($editMode)

                <button
                    wire:click="update"
                    class="px-4 py-2 bg-sky-500 text-white rounded-lg">
                    Update
                </button>

                @else

                <button
                    wire:click="save"
                    class="px-4 py-2 bg-sky-500 text-white rounded-lg">
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

            <h3 class="text-lg font-semibold text-slate-700 mb-4">
                Delete Testimonial
            </h3>

            <p class="text-slate-500 mb-6">
                Are you sure you want to delete this testimonial?
            </p>

            <div class="flex justify-end gap-3">

                <button
                    wire:click="closeDeleteModal"
                    class="px-4 py-2 bg-slate-200 rounded-lg">
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