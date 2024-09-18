<?php

use Livewire\Volt\Component;

new class extends Component {
    public string $title;
    public string $body;
    public string $resipient;
    public string $send_date;
    // public string $is_published;

    public function submit()
    {
        $validation = $this->validate([
            'title' => 'required|string|min:5',
            'body' => 'required|string|min:20',
            'send_date' => 'required|date',
            'resipient' => 'required|email',
            // 'is_published' => 'boolean|nullable',
        ]);

        auth()->user()->notes()->create($validation);

        redirect(route('notes.index'));
    }
}; ?>

<div>
    <form wire:submit='submit' class="space-y-4">
        <x-input wire:model="title" label="Note Title" placeholder="It's been a great day" value="{{ old('title') }}" />

        <x-textarea wire:model="body" label="your note" placeholder="share by your friend" value="{{ old('body') }}"/>

        <x-input icon="user" wire:model="resipient" label="resipient" placeholder="yourfriend@email.com"
            type="email" value="{{ old('email') }}"/>

        <x-input icon="calendar" wire:model="send_date" type="date" label="send date" value="{{ old('send_date') }}"/>

        {{-- <x-checkbox wire:model="is_published" value="{{ old('is_published') }}"/> --}}

        <div class="pt-4">
            <x-button wire:click="submit" rose right-icon="calendar" spiner>Schedule Note</x-button>
        </div>

        <x-errors />
    </form>
</div>
