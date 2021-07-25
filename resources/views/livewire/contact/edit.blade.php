<div>
    <form wire:submit.prevent="update">
        <input type="hidden" wire:model="contactId">
        <x-form.contact />
    </form>
</div>
