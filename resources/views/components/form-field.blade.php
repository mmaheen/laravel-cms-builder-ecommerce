<div class="mb-3">
    @if (!empty($field['label']))
        <label for="{{ $field['name'] }}" class="form-label">{{ $field['label'] }}</label>
    @endif

    @switch($field['type'])
        @case('text')
        @case('email')

        @case('password')
        @case('number')

        @case('date')
        @case('color')
            <input type="{{ $field['type'] }}" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                value="{{ $field['value'] ?? '' }}" placeholder="{{ $field['placeholder'] ?? '' }}"
                class="{{ $field['class'] ?? 'form-control' }}">
        @break

        @case('textarea')
            <textarea name="{{ $field['name'] }}" id="{{ $field['name'] }}" rows="{{ $field['rows'] ?? 4 }}"
                placeholder="{{ $field['placeholder'] ?? '' }}" class="{{ $field['class'] ?? 'form-control' }}">{{ $field['value'] ?? '' }}</textarea>
        @break

        @case('file')
            <input type="file" name="{{ $field['name'] }}" id="{{ $field['name'] }}"
                class="{{ $field['class'] ?? 'form-control' }}">
        @break

        @case('select')
            <select name="{{ $field['name'] }}" id="{{ $field['name'] }}" class="{{ $field['class'] ?? 'form-select' }}">
                @foreach ($field['options'] as $value => $label)
                    <option value="{{ $value }}" {{ ($field['selected'] ?? '') == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
        @break

        @case('checkbox_group')
            @foreach ($field['options'] as $value => $label)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="{{ $field['name'] }}[]" value="{{ $value }}"
                        id="{{ $field['name'] . $value }}" {{ in_array($value, $field['selected'] ?? []) ? 'checked' : '' }}>
                    <label class="form-check-label" for="{{ $field['name'] . $value }}">
                        {{ $label }}
                    </label>
                </div>
            @endforeach
        @break

    @endswitch
</div>
