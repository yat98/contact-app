<div class="row {{ $class }}">
    <div class="col">
        <select wire:model="paginatePage" class="form-select form-select-sm w-auto">
            @foreach ([5, 10, 15] as $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>
    <div class="col">
        <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="Search">
    </div>
</div>
