@props(['name','label'])
<div>
    <div class="form-check">
        <input wire:model="{{ $name }}" type="checkbox" class="form-check-input" id="{{ $name }}">
        <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    </div>
</div>
