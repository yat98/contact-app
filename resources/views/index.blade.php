<x-layouts.layout title="Home">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-8">
                <x-partials.card>
                    <x-slot name="header">Contact</x-slot>
                    <x-slot name="body">@livewire('contact.index')</x-slot>
                </x-partials.card>
            </div>
        </div>
    </div>
</x-layouts.layout>
