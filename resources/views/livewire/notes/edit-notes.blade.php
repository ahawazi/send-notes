<?php

use Livewire\Volt\Component;
use App\Models\Note;

new class extends Component {
    public Note $note;

    public $title;
    public $body;
    public $resipient;
    public $send_date;
    public $is_published;

    public function mount(Note $note)
    {
        $this->authorize('update', $note);
        $this->fill($note);
    }

    public function saveNote()
    {
        $validation = $this->validate([
            'title' => 'required|string|min:5',
            'body' => 'required|string|min:20',
            'send_date' => 'required|date',
            'resipient' => 'required|email',
            'is_published' => 'boolean',
        ]);

        auth()->user()->notes()->update($validation);

        $this->dispatch('note-saved');

        redirect(route('notes.index'));
    }
}; ?>

<div class="py-12">
    <div class="max-w-2xl mx-auto space-y-4 sm:px-6 lg:px-8">
        <form wire:submit='saveNote' class="space-y-4">
            <x-input wire:model="title" label="Note Title" placeholder="It's been a great day." />
            <x-textarea wire:model="body" label="Your Note"
                placeholder="Share all your thoughts with your friend." />
            <x-input icon="user" wire:model="recipient" label="Recipient" placeholder="yourfriend@email.com"
                type="email" />
            <x-input icon="calendar" wire:model="send_date" type="date" label="Send Date" />
            <x-checkbox label="Note Published" wire:model='is_published' />
            <div class="flex justify-between pt-4">
                <x-button type="submit" secondary spinner="saveNote">Save Note</x-button>
                <x-button href="{{ route('notes.index') }}" flat negative>Back to Notes</x-button>
            </div>
            <x-action-message on="note-saved" />
            <x-errors />
        </form>
    </div>
</div>