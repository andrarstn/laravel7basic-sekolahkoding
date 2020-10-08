<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <input type="{{ $type }}" class="form-control" id="{{ $field }}" name="{{ $field }}" @isset($oldvalue)
        value="{{ old($field)?old($field):$oldvalue}}" @else value="{{ old($field) }}" @endisset
        placeholder="{{ $placeholder ?? '' }}">
    @error($field)
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>