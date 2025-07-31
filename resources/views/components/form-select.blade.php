@props(['name', 'label'])
<div class="form-group">
    <label>{{ $label }}</label>
    <select wire:model="{{ $name }}" class="form-control @error($name) is-invalid @enderror">
        {{ $slot }}
    </select>
@error($name)
    <div class="form-text text-danger">
        {{ $message }}
    </div>
@enderror
</div>

