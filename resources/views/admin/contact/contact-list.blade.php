<?php

use Livewire\Component;
use App\Models\Contact;
use Livewire\Attributes\Layout;

new #[Layout('layouts::admin')] class extends Component {

    public $contactId;
    public $selectedContact;
    public $showViewModal = false;
    public $showDeleteModal = false;

    public function showView($id)
    {
        $contact = Contact::findOrFail($id);

        $this->selectedContact = $contact;
        $this->showViewModal = true;

        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
            $this->selectedContact = $contact->fresh();
        }
    }

    public function markAsRead($id)
    {
        Contact::findOrFail($id)->update(['is_read' => true]);

        $this->dispatch('toast-show', [
            'message' => 'Marked as read',
            'type' => 'success',
        ]);
    }

    public function markAsUnread($id)
    {
        Contact::findOrFail($id)->update(['is_read' => false]);

        $this->dispatch('toast-show', [
            'message' => 'Marked as unread',
            'type' => 'success',
        ]);
    }

    public function confirmDelete($id)
    {
        $this->contactId = $id;
        $this->showDeleteModal = true;
    }

    public function delete()
    {
        Contact::findOrFail($this->contactId)->delete();

        if ($this->selectedContact && $this->selectedContact->id === $this->contactId) {
            $this->selectedContact = null;
            $this->showViewModal = false;
        }

        $this->showDeleteModal = false;

        $this->dispatch('toast-show', [
            'message' => 'Contact deleted successfully',
            'type' => 'success'
        ]);
    }

    public function with()
    {
        return [
            'contacts' => Contact::latest()->get()
        ];
    }
};
?>

<div class="max-w-7xl mx-auto px-4 sm:px-6 py-6">

    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 mb-6">
        <div>
            <h1 class="text-lg sm:text-xl font-semibold text-slate-800">Contact Enquiries</h1>
            <p class="text-sm text-slate-500">Manage messages submitted from website contact form</p>
        </div>
    </div>

    <!-- Table -->
    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Contact</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Subject</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Message</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Date</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-slate-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-right text-xs font-medium text-slate-500 uppercase">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-100">
                    @forelse($contacts as $contact)
                    <tr class="hover:bg-slate-50 {{ $contact->is_read ? '' : 'bg-blue-50/40' }}">
                        <td class="px-4 py-3">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-md bg-blue-100 text-blue-600 flex items-center justify-center text-sm font-semibold">
                                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-medium text-slate-800 text-sm">{{ $contact->name }}</p>
                                    <p class="text-xs text-slate-500">{{ $contact->email ?: 'No email' }}</p>
                                    @if($contact->phone)
                                    <p class="text-xs text-slate-400">{{ $contact->phone }}</p>
                                    @endif
                                </div>
                            </div>
                        </td>

                        <td class="px-4 py-3 text-slate-600">
                            {{ $contact->subject ?: 'General Enquiry' }}
                        </td>

                        <td class="px-4 py-3 text-slate-600 max-w-xs truncate">
                            {{ $contact->message }}
                        </td>

                        <td class="px-4 py-3 text-xs text-slate-500">
                            {{ $contact->created_at?->format('d M Y, h:i A') }}
                        </td>

                        <td class="px-4 py-3">
                            @if($contact->is_read)
                            <span class="px-2 py-0.5 text-xs rounded-md bg-emerald-50 text-emerald-700 border border-emerald-200">Read</span>
                            @else
                            <span class="px-2 py-0.5 text-xs rounded-md bg-amber-50 text-amber-700 border border-amber-200">Unread</span>
                            @endif
                        </td>

                        <td class="px-4 py-3 text-right">
                            <div class="flex justify-end gap-2">
                                <button
                                    wire:click="showView({{ $contact->id }})"
                                    class="p-1.5 rounded-md text-slate-500 hover:text-blue-600 hover:bg-slate-100"
                                    title="View message">
                                    <i class="ri-eye-line"></i>
                                </button>

                                @if($contact->is_read)
                                <button
                                    wire:click="markAsUnread({{ $contact->id }})"
                                    class="p-1.5 rounded-md text-slate-500 hover:text-amber-600 hover:bg-slate-100"
                                    title="Mark as unread">
                                    <i class="ri-mail-unread-line"></i>
                                </button>
                                @else
                                <button
                                    wire:click="markAsRead({{ $contact->id }})"
                                    class="p-1.5 rounded-md text-slate-500 hover:text-emerald-600 hover:bg-slate-100"
                                    title="Mark as read">
                                    <i class="ri-mail-check-line"></i>
                                </button>
                                @endif

                                <button
                                    wire:click="confirmDelete({{ $contact->id }})"
                                    class="p-1.5 rounded-md text-slate-500 hover:text-red-600 hover:bg-slate-100"
                                    title="Delete contact">
                                    <i class="ri-delete-bin-line"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="py-16 text-center text-slate-400">
                            <i class="ri-mail-line text-4xl mb-2"></i>
                            <p>No contact enquiries found</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- View Modal -->
    <div
        x-data="{ show: @entangle('showViewModal') }"
        x-show="show"
        x-cloak
        class="fixed inset-0 flex items-center justify-center bg-black/40 z-50 p-4">
        <div class="bg-white rounded-lg shadow-xl w-full max-w-2xl">
            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100">
                <h3 class="text-sm font-semibold text-slate-800">Contact Message</h3>
                <button @click="show=false">
                    <i class="ri-close-line text-lg text-slate-400"></i>
                </button>
            </div>

            @if($selectedContact)
            <div class="px-5 py-4 space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                    <div>
                        <p class="text-xs text-slate-500">Name</p>
                        <p class="font-medium text-slate-800">{{ $selectedContact->name }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">Date</p>
                        <p class="font-medium text-slate-800">{{ $selectedContact->created_at?->format('d M Y, h:i A') }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">Email</p>
                        <p class="font-medium text-slate-800">{{ $selectedContact->email ?: 'Not provided' }}</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500">Phone</p>
                        <p class="font-medium text-slate-800">{{ $selectedContact->phone ?: 'Not provided' }}</p>
                    </div>
                    <div class="sm:col-span-2">
                        <p class="text-xs text-slate-500">Subject</p>
                        <p class="font-medium text-slate-800">{{ $selectedContact->subject ?: 'General Enquiry' }}</p>
                    </div>
                </div>

                <div>
                    <p class="text-xs text-slate-500 mb-1">Message</p>
                    <div class="bg-slate-50 border border-slate-200 rounded-md p-3 text-sm text-slate-700 whitespace-pre-line">
                        {{ $selectedContact->message }}
                    </div>
                </div>
            </div>
            @endif

            <div class="flex justify-end gap-2 px-5 py-4 border-t border-slate-100">
                <button
                    type="button"
                    @click="show=false"
                    class="px-3 py-1.5 text-sm rounded-md text-slate-600 hover:bg-slate-100">
                    Close
                </button>
            </div>
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
            <h3 class="font-semibold text-slate-800 mt-3">Delete Contact</h3>
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