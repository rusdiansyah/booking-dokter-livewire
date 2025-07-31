@props(['name', 'label'])
<div>
    <div class="col-12">
        <div class="form-group">
            <label>{{ $label }}</label>
            <textarea wire:model="{{ $name }}" class="form-control" rows="3" placeholder="{{ $label }}"></textarea>
            @error($name)
                <div class="form-text text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
</div>
