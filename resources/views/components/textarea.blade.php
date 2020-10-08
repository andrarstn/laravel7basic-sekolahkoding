<div class="form-group">
    <label for="{{ $field }}">{{ $label }}</label>
    <textarea type="{{ $type }}" class="form-control" id="{{ $field }}" name="{{ $field }}" rows="3">@isset($oldvalue){{ old($field)?old($field):$oldvalue}} @else {{ old($field) }} @endisset    
    </textarea>
    @error($field)
    <small class="text-danger">{{ $message }}</small>
    @enderror
</div>