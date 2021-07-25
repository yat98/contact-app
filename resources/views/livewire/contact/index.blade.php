<div>
    <x-partials.alert type="success" />
    @if ($isEdited)
        <livewire:contact.edit />
    @else
        <livewire:contact.create />
    @endif
    <hr>
    <x-partials.search class="mb-3" />
    <table class="table table-responsive table-striped">
        <thead class="table-dark">
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
        </thead>
        <tbody>
            @forelse($contacts as $contact)
                <tr>
                    <th scope="row">{{ $loop->iteration + $contacts->firstItem() - 1 }}</th>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>
                        <button wire:click="getContact({{ $contact->id }})"
                            class="btn btn-sm btn-warning text-dark">{{ __('Edit') }}</button>
                        <button wire:click="destroy({{ $contact->id }})"
                            class="btn btn-sm btn-danger">{{ __('Hapus') }}</button>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">{{ __('Data Kosong') }}</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $contacts->links() }}
</div>
