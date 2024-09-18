<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit a note') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <x-button icon="arrow-left" class="mb-8" href="{{ route('notes.index') }}">All Notes</x-button>
            <livewire:notes.edit-notes :note="$note"/>
        </div>
    </div>
</x-app-layout>
