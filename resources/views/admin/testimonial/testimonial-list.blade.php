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
        $this->reset(['name','client_info','message','testimonialId','editMode']);
        $this->is_active = true;
    }

    public function save()
    {
        $this->validate();

        Testimonial::create([
            'name'=>$this->name,
            'client_info'=>$this->client_info,
            'message'=>$this->message,
            'is_active'=>$this->is_active
        ]);

        $this->closeModal();

        $this->dispatch('toast-show',[
            'message'=>'Testimonial added successfully',
            'type'=>'success'
        ]);
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
            'name'=>$this->name,
            'client_info'=>$this->client_info,
            'message'=>$this->message,
            'is_active'=>$this->is_active
        ]);

        $this->closeModal();

        $this->dispatch('toast-show',[
            'message'=>'Testimonial updated successfully',
            'type'=>'success'
        ]);
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

        $this->dispatch('toast-show',[
            'message'=>'Testimonial deleted successfully',
            'type'=>'success'
        ]);
    }

    public function with()
    {
        return [
            'testimonials'=>Testimonial::latest()->get()
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">

<!-- Header -->

<div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">

<div>
<h1 class="text-lg sm:text-xl font-semibold text-slate-800">Testimonials</h1>
<p class="text-sm text-slate-500">Manage client feedback</p>
</div>

<button
wire:click="openModal"
class="inline-flex items-center justify-center gap-2 bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded-md text-sm font-medium transition">

<i class="ri-add-line"></i>
Add Testimonial

</button>

</div>


<!-- Table -->

<div class="bg-white rounded-lg shadow-sm overflow-hidden">

<div class="overflow-x-auto">

<table class="w-full text-sm">

<thead class="bg-slate-50">

<tr>

<th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">
Client
</th>

<th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">
Message
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

@forelse($testimonials as $testimonial)

<tr class="hover:bg-slate-50">

<td class="px-4 py-3">

<div class="flex items-center gap-3">

<div class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center text-sm font-semibold">
{{ substr($testimonial->name,0,1) }}
</div>

<div>

<p class="font-medium text-slate-800 text-sm">
{{ $testimonial->name }}
</p>

<p class="text-xs text-slate-500">
{{ $testimonial->client_info ?? 'Client' }}
</p>

</div>

</div>

</td>

<td class="px-4 py-3 text-slate-600 max-w-xs truncate">
{{ $testimonial->message }}
</td>

<td class="px-4 py-3">

@if($testimonial->is_active)

<span class="text-xs bg-blue-50 text-blue-600 px-2 py-0.5 rounded-md">
Active
</span>

@else

<span class="text-xs bg-slate-100 text-slate-500 px-2 py-0.5 rounded-md">
Inactive
</span>

@endif

</td>

<td class="px-4 py-3 text-right">

<div class="flex justify-end gap-2">

<button
wire:click="edit({{ $testimonial->id }})"
class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-slate-100">

<i class="ri-edit-line"></i>

</button>

<button
wire:click="confirmDelete({{ $testimonial->id }})"
class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-slate-100">

<i class="ri-delete-bin-line"></i>

</button>

</div>

</td>

</tr>

@empty

<tr>

<td colspan="4" class="py-16 text-center text-slate-400">

<i class="ri-chat-voice-line text-4xl mb-2"></i>

<p>No testimonials found</p>

</td>

</tr>

@endforelse

</tbody>

</table>

</div>

</div>


<!-- Create / Edit Modal -->

<div
x-data="{ show: @entangle('showModal') }"
x-show="show"
x-cloak
class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">

<div class="bg-white rounded-lg w-full max-w-md shadow-xl">

<div class="flex items-center justify-between px-5 py-4">

<h3 class="text-sm font-semibold text-slate-800">
{{ $editMode ? 'Edit Testimonial' : 'Create Testimonial' }}
</h3>

<button @click="show=false">
<i class="ri-close-line text-lg text-slate-400"></i>
</button>

</div>

<form wire:submit.prevent="{{ $editMode ? 'update' : 'save' }}" class="px-5 pb-5 space-y-4">

<div>

<label class="text-xs font-medium text-slate-600">
Client Name
</label>

<input
type="text"
wire:model="name"
class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">

@error('name')
<p class="text-xs text-red-500 mt-1">{{ $message }}</p>
@enderror

</div>


<div>

<label class="text-xs font-medium text-slate-600">
Client Info
</label>

<input
type="text"
wire:model="client_info"
class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500">

</div>


<div>

<label class="text-xs font-medium text-slate-600">
Message
</label>

<textarea
wire:model="message"
rows="4"
class="w-full mt-1 border border-slate-300 rounded-md px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500"></textarea>

@error('message')
<p class="text-xs text-red-500 mt-1">{{ $message }}</p>
@enderror

</div>


<div class="flex items-center gap-2">

<input type="checkbox" wire:model="is_active">

<span class="text-sm text-slate-600">
Display on website
</span>

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
class="px-3 py-1.5 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm font-medium">

{{ $editMode ? 'Update' : 'Save' }}

</button>

</div>

</form>

</div>

</div>


<!-- Delete Modal -->

<div
x-data="{ show: @entangle('showDeleteModal') }"
x-show="show"
x-cloak
class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">

<div class="bg-white rounded-lg shadow-xl w-full max-w-sm p-6 text-center">

<i class="ri-error-warning-line text-red-500 text-3xl"></i>

<h3 class="font-semibold text-slate-800 mt-3">
Delete Testimonial
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