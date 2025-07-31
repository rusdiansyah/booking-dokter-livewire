@props(['type'=>'text','name','label'])
<div>
    <div class="form-group">
        <label for="{{ $label }}">{{ $label }}</label>
        <input type="{{ $type }}" wire:model="{{ $name }}" class="form-control @error($name) is-invalid @enderror" id="{{ $name }}"
            placeholder="{{ $label }}">
        @error($name)
            <div class="form-text text-danger">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
