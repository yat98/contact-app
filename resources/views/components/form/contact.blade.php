<div class="form-group">
    <div class="row">
        <div class="col">
            <input wire:model="name" type="text" class="form-control @error('name') is-invalid @enderror"
                placeholder="Name">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="col">
            <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                placeholder="Phone">
            @error('phone')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="d-grid mt-3">
            <button class="btn btn-sm btn-primary">Submit</button>
        </div>
    </div>
</div>
